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
            'inspection' => 'nullable',
            'inspectionImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000',
            'bill' => 'nullable',
            'billImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000',
            'damage' => 'required',
            'damageImage' => 'image | nullable | mimes:jpeg,jpg,png | max:5000'
        ]);

        $inspectionImagefile = null;
        $damageImagefile = null;
        $billImagefile = null;

        if( $request->hasFile('inspectionImage') ){
            $inspection = $request->file('inspectionImage');
            $inspectionImagefile = rand(1111, 9999) . date('ymdhis.') . $inspection->getClientOriginalExtension();
            $inspection->move(public_path('images/posts/inspection/'), $inspectionImagefile);
        }

        if( $request->hasFile('damageImage') ){
            $damage = $request->file('damageImage');
            $damageImagefile = rand(1111, 9999) . date('ymdhis.') . $damage->getClientOriginalExtension();
            $damage->move(public_path('images/posts/damage/'), $damageImagefile);
        }

        if( $request->hasFile('billImage') ){
            $bill = $request->file('billImage');
            $billImagefile = rand(1111, 9999) . date('ymdhis.') . $bill->getClientOriginalExtension();
            $bill->move(public_path('images/posts/bill/'), $billImagefile);
        }

        $request->user()->posts()->create([
            'date' => $request->date,
            'name' => $request->name,
            'vehicle' => $request->vehicle,
            'vehicle_type' => $request->vehicle_type,
            'distance' => $request->distance,
            'inspection' => $request->inspection,
            'inspectionImage' => $inspectionImagefile,
            'bill' => $request->bill,
            'billImage' => $billImagefile,
            'damage' => $request->damage,
            'damageImage' => $damageImagefile,
        ]);

        return back()->with('success', 'Post added successfully!');










        
        // if(($request->hasFile('damageImage'))==true && ($request->hasFile('billImage'))==true && ($request->hasFile('inspectionImage'))==true) {
            
        //     $photo = $request->file('damageImage');
        //     $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
        //     $photo->move(public_path('images/posts/damage/'), $fileName);

        //     $photo2 = $request->file('billImage');
        //     $fileName2 = rand(1111, 9999) . date('ymdhis.') . $photo2->getClientOriginalExtension();
        //     $photo2->move(public_path('images/posts/bill/'), $fileName2);

        //     $photo3 = $request->file('inspectionImage');
        //     $fileName3 = rand(1111, 9999) . date('ymdhis.') . $photo3->getClientOriginalExtension();
        //     $photo3->move(public_path('images/posts/inspection/'), $fileName3);


        //     $request->user()->posts()->create([
        //         'date' => $request->date,
        //         'name' => $request->name,
        //         'vehicle' => $request->vehicle,
        //         'vehicle_type' => $request->vehicle_type,
        //         'distance' => $request->distance,
        //         'inspection' => $request->inspection,
        //         'inspectionImage' => $fileName3,
        //         'bill' => $request->bill,
        //         'billImage' => $fileName2,
        //         'damage' => $request->damage,
        //         'damageImage' => $fileName,
        //     ]);

        //     return back()->with('success', 'Post added successfully!');
        // }

        // elseif(($request->hasFile('damageImage'))==false && ($request->hasFile('billImage'))==true) {
        //     $photo2 = $request->file('billImage');
        //     $fileName2 = rand(1111, 9999) . date('ymdhis.') . $photo2->getClientOriginalExtension();
        //     $photo2->move(public_path('images/posts/bill/'), $fileName2);

        //     $request->user()->posts()->create([
        //         'date' => $request->date,
        //         'name' => $request->name,
        //         'vehicle' => $request->vehicle,
        //         'vehicle_type' => $request->vehicle_type,
        //         'distance' => $request->distance,
        //         'bill' => $request->bill,
        //         'billImage' => $fileName2,
        //         'damage' => $request->damage,
        //     ]);

        //     return back()->with('success', 'Post added successfully!');
        // }
        // elseif(($request->hasFile('damageImage'))==true && ($request->hasFile('billImage'))==false) {

        //     $photo = $request->file('damageImage');
        //     $fileName = rand(1111, 9999) . date('ymdhis.') . $photo->getClientOriginalExtension();
        //     $photo->move(public_path('images/posts/damage/'), $fileName);

        //     $request->user()->posts()->create([
        //         'date' => $request->date,
        //         'name' => $request->name,
        //         'vehicle' => $request->vehicle,
        //         'vehicle_type' => $request->vehicle_type,
        //         'distance' => $request->distance,
        //         'bill' => $request->bill,
        //         'damage' => $request->damage,
        //         'damageImage' => $fileName,
        //     ]);

        //     return back()->with('success', 'Post added successfully!');

        // }

        // else {
        //     $request->user()->posts()->create([
        //         'date' => $request->date,
        //         'name' => $request->name,
        //         'vehicle' => $request->vehicle,
        //         'vehicle_type' => $request->vehicle_type,
        //         'distance' => $request->distance,
        //         'bill' => $request->bill,
        //         'damage' => $request->damage,
        //     ]);

        // }

        // return back()->with('success', 'Post added successfully!');

     
    }


    public function destroy(Post $post) {



        
        dd($post);

        return back();
    }

}
