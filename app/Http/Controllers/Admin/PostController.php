<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    protected $validation =[
        'title' => 'required|string|max:100',
        'content' => 'required',
        'published' => 'sometimes|accepted',
        'category_id' => 'nullable|exists:categories,id',
        'tags'=>'nullable|exists:tags,id'

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags= Tag::All();
        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);
        $data = $request->all();
        
        $newPost=new Post();
        $newPost->title= $data['title'];
        // $slug = Str::of($data['title'])->slug("-");
        $newPost->content= $data['content'];
        $newPost->published= isset($data['published']);
        $newPost->category_id= $data['category_id'];
        // $count=1;
        // while (Post::where('slug',$slug)->first()) {
        //     $slug= Str::of($data['title'])->slug("-") . "-($count)";
        //     $count++;
        // }
        $newPost->slug = $this->getSlug($newPost->title);
        $newPost->save();

        if(isset($data['tags'])) {
            $newPost->tags()->sync($data['tags']);
    }
        return redirect()->route('admin.posts.show',$newPost->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)//id
    {   
        // $post= Post::findOrFail($id);
        // dd($post->category);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validation);

        $data = $request->all();

        if($post->title != $data['title']){
            $post->title = $data['title'];
            $slug = Str::of($post->title)->slug("-");
            if($slug != $post->slug){
                $post->slug = $this->getSlug($post->title);
        }
    }
    $post->category_id = $data['category_id'];
    $post->content = $data['content'];
    $post->published = isset($data['published']);
    $post->update();
    return redirect()->route('admin.posts.show',$post->id);

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $post = Post::findOrFail($id);
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getSlug($title){
    $slug = Str::of($title)->slug("-");
    $count =1;

    while(Post::where("slug", $slug)->first()){
        $slug =Str::of($title)->slug("-") . "-($count)";
        $count++;
    }
    return $slug;
}
}