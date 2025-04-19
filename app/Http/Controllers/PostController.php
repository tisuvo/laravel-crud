<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;


class PostController extends Controller
{
    public function create(){
    	return view('create');
    }

    public function ourfilestore(Request $request){



    	  $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|mimes:jpg,bmp,png',
    ]);


// upload img
$imagename=null;
    	  if (isset($request->image)) {
    	  $imagename=time().'.'.$request->image->extension();
    	  $request->image->move(public_path('images'), $imagename);

    	  }

    	  

       // add post
    	$post =new Post;
    	$post->name =$request->name;
    	$post->description =$request->description;
    	$post->image =$imagename;

    	$post->save();

    	return redirect()->route('home')->with('success', 'successfully created!');
    }



    public function editdata($id){
    	$post = Post::findOrFail($id);
    	return view('edit', ['ourPost'=>$post]);
    }


    public function updatedata($id, Request $request)
{
    $post = Post::findOrFail($id);

    	  $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|mimes:jpg,bmp,png',
    ]);


    	  

    	$post->name =$request->name;
    	$post->description =$request->description;
    	
    	  if (isset($request->image)) {
    	  $imagename=time().'.'.$request->image->extension();
    	  $request->image->move(public_path('images'), $imagename);
$post->image =$imagename;
    	  }


    	$post->save();

    	return redirect()->route('home')->with('success', 'successfully created!');
}




   public function deletedata($id){
       $post = Post::findOrFail($id);

    $post->delete();

    flash()->success('Your changes have been saved!');

return redirect()->route('home')->;

   	}

}
