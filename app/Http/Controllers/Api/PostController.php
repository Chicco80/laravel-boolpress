<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
        $posts = Post::All();
        return response()->json($posts); // fa prendere le api del nostro db
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with(['category','tags'])->first();
        return response()->json($post);
    }//->first ritorna un elemento, ->get() un array entrambi utilizzati con where
}
