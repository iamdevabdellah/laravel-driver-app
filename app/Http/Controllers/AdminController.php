<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function all() {

        $posts = Post::latest()->with('user')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
