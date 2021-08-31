<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
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
            'date' => 'required',
            'car' => 'required',
            'distance' => 'required',
            'cost' => 'required',
            'damage' => 'required',
            'damageImage' => 'image',
            'body' => 'required'
        ]);

        $photo = $request->file('damageImage');
        $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
        $photo->move(public_path('images/posts/'), $fileName);
//        if($photo->isValid()) {
//            $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
//        }

       // $photo->storeAs('images', $fileName);

        $request->user()->posts()->create([
            'date' => $request->date,
            'car' => $request->car,
            'distance' => $request->distance,
            'cost' => $request->cost,
            'damage' => $request->damage,
            'damageImage' => $fileName,
            'body' => $request->body
        ]);

        return back();

        // redirect
        //return redirect()->route('home');
    }
}
