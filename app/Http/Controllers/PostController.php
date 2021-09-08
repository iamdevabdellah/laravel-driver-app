<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

        //validation
        $this->validate($request, [
            'date' => 'required | date',
            'name' => 'required',
            'vehicle_type' => 'required',
            'vehicle' => 'required | max:255',
            'distance' => 'required',
            'bill' => 'nullable',
            'billImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000',
            'damage' => 'required',
            'damageImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000'
        ]);
        
        if(($request->hasFile('damageImage'))==true && ($request->hasFile('billImage'))==true) {
            
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

        elseif(($request->hasFile('damageImage'))==false && ($request->hasFile('billImage'))==true) {
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

            return back()->with('success', 'Post added successfully!');
        }
        elseif(($request->hasFile('damageImage'))==true && ($request->hasFile('billImage'))==false) {

            $photo = $request->file('damageImage');
            $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/posts/damage/'), $fileName);

            $request->user()->posts()->create([
                'date' => $request->date,
                'name' => $request->name,
                'vehicle' => $request->vehicle,
                'vehicle_type' => $request->vehicle_type,
                'distance' => $request->distance,
                'bill' => $request->bill,
                'damage' => $request->damage,
                'damageImage' => $fileName,
            ]);

            return back()->with('success', 'Post added successfully!');

        }

        else {
            $request->user()->posts()->create([
                'date' => $request->date,
                'name' => $request->name,
                'vehicle' => $request->vehicle,
                'vehicle_type' => $request->vehicle_type,
                'distance' => $request->distance,
                'bill' => $request->bill,
                'damage' => $request->damage,
            ]);

        }

        return back()->with('success', 'Post added successfully!');

     
    }


    public function destroy(Post $post) {



        
        dd($post);

        return back();
    }

}
