<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;


class SearchController extends Controller
{

    public function index() {

        $posts = Post::latest()->with('user')->paginate(40);  

        return view('admin.search', [
            'posts' => $posts
        ]);
    }

    public function view(Request $request){

        $searchName = $request->input('nameSearch');
        $searchDateFrom = $request->input('dateSearchFrom');
        $searchDateTo = $request->input('dateSearchTo');

        if($searchName != "" && $searchDateFrom != "" && $searchDateTo != ""){
            $posts = DB::table('posts')
            ->where('vehicle', 'LIKE', '%'.$searchName.'%')
            ->where('date', '>=', $searchDateFrom)
            ->where('date', '<=', $searchDateTo)
            ->get();

        }
        
        elseif($searchName != "" && $searchDateFrom == "" && $searchDateTo == "") {
            $posts = DB::table('posts')
            ->where('vehicle', 'LIKE', '%'.$searchName.'%')
            ->get();

        }
        elseif($searchName != "" && $searchDateFrom != "" && $searchDateTo == "") {
            $posts = DB::table('posts')
            ->where('vehicle', 'LIKE', '%'.$searchName.'%')
            ->where('date', '=', $searchDateFrom)
            ->get();

        }

        else{
            $posts = Post::latest()->with('user');
        }

        return view('admin.search', [
            'posts' => $posts
        ]);

    }
}
