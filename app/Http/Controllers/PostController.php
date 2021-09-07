<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function __construct() {

        $this->middleware(['auth']);

    }


    public function index() {

        $posts = Post::latest()->with('user')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {

        //dd($request);

        $this->validate($request, [
            'date' => 'required | date',
            'name' => 'required',
            'car' => 'required | max:255',
            'distance' => 'required',
            'cost' => 'required',
            'damage' => 'required',
            'damageImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000'
        ]);

        // $photo = $request->file('damageImage');
        // if($photo->isValid('damageImage')) {
        //     $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
        //     $photo->move(public_path('images/posts/'), $fileName);
        // }

        
        if($request->hasFile('damageImage')) {
            $photo = $request->file('damageImage');
            $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/posts/'), $fileName);

            $request->user()->posts()->create([
                'date' => $request->date,
                'name' => $request->name,
                'car' => $request->car,
                'distance' => $request->distance,
                'cost' => $request->cost,
                'damage' => $request->damage,
                'damageImage' => $fileName,
            ]);

            return back()->with('success', 'Post added successfully!');
        }


        
//        if($photo->isValid()) {
//            $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
//        }

       // $photo->storeAs('images', $fileName);

        $request->user()->posts()->create([
            'date' => $request->date,
            'name' => $request->name,
            'car' => $request->car,
            'distance' => $request->distance,
            'cost' => $request->cost,
            'damage' => $request->damage
            // 'damageImage' => $fileName,
        ]);

        return back()->with('success', 'Post added successfully!');

     
    }

    public function export(Request $request) {
        
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

}
