<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ListController extends Controller
{
    public function index() {

        $posts = Post::latest()->with('user')->paginate(40);

        return view('admin.list', [
            'posts' => $posts
        ]);
    }
}
