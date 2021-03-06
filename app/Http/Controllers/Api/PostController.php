<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return response()->json($posts); // fa prendere le api del nostro db
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with(['category','tags','comments'])->first();
        if(empty($post)){
            return response()->json(['message' => 'No post found'],404);//404 errore pagina
        }
        return response()->json($post);
    //->first ritorna un elemento, ->get() un array entrambi utilizzati con where
}
}
