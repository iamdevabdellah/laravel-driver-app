<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;

class PostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $posts;

    public function __construct($posts) {

        $this->posts = $posts;
    }

    public function view(): View {

        return view('exports.posts', [
            'posts' => $this->posts
        ]);
    }

    // protected $data;

    // public function __construct($data) {
    //     $this->data = $data;
    // }
    

    public function collection() {

         return Post::all();
        
    }


    
}
