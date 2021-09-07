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
            'vehicle_type' => 'required',
            'vehicle' => 'required | max:255',
            'distance' => 'required',
            'bill' => 'required',
            'billImage' => 'image | required | mimes:jpeg,jpg,png | max:5000',
            'damage' => 'required',
            'damageImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000'
        ]);
        
        if($request->hasFile('damageImage')) {
            $photo = $request->file('damageImage');
            $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/posts/damage/'), $fileName);

            $photo2 = $request->file('billImage');
            $fileName2 = rand(1111, 9999) . date('ymdhis.') . $photo2->getClientOriginalExtension();
            $photo2->move(public_path('images/posts/bill/'), $fileName2);


            $request->user()->posts()->create([
                'date' => $request->date,
                'name' => $request->name,
                'vehicle' => $request->vehicle,
                'vehicle_type' => $request->vehicle_type,
                'distance' => $request->distance,
                'bill' => $request->bill,
                'billImage' => $fileName2,
                'damage' => $request->damage,
                'damageImage' => $fileName,
            ]);

            return back()->with('success', 'Post added successfully!');
        }

        else {
            $photo2 = $request->file('billImage');
            $fileName2 = rand(1111, 9999) . date('ymdhis.') . $photo2->getClientOriginalExtension();
            $photo2->move(public_path('images/posts/bill/'), $fileName2);

            $request->user()->posts()->create([
                'date' => $request->date,
                'name' => $request->name,
                'vehicle' => $request->vehicle,
                'vehicle_type' => $request->vehicle_type,
                'distance' => $request->distance,
                'bill' => $request->bill,
                'billImage' => $fileName2,
                'damage' => $request->damage,
            ]);


        }

        // $request->user()->posts()->create([
        //     'date' => $request->date,
        //     'name' => $request->name,
        //     'vehicle' => $request->vehicle,
        //     'distance' => $request->distance,
        //     'bill' => $request->bill,
        //     'damage' => $request->damage
        // ]);

        return back()->with('success', 'Post added successfully!');

     
    }

    public function export(Request $request) {
        
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

}
