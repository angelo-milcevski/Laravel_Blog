<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::orderBy('created_at', 'DESC')->paginate(12);
		
        return view('index')->with('posts', $posts);
		
    }

	 /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */

     
    public function show($slug)
    {
        $post= Post::where('slug', $slug)->first();
		
		return view('post')->with('post', $post);
    }

  
}
