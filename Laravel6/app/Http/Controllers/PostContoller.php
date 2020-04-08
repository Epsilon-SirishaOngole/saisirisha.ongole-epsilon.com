<?php

namespace LearnApp\Http\Controllers;

use Illuminate\Http\Request;
use LearnApp\Http\Requests\Posts\CreatePostRequest;
use LearnApp\Http\Requests\Posts\UpdatePostRquest;
use LearnApp\Post;
use LearnApp\Category;
use LearnApp\Tag;
use Illuminate\Support\Facades\Auth;

class PostContoller extends Controller
{

    public function __construct(){
        
        $this->middleware('verifycatogerycount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user()->siteAdmin != 1)
            return view('posts.index')->with('posts',Post::all());
    }

    public function apiShowPosts()
    {
      return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
       
        $image = $request->image->store('posts');
        $post =Post::create([
            'title' => $request->name,
            'description' => $request->description,
            'content'=> $request->content,
            'category_id'=> $request->catogery,
            'image'=> $image
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }


        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Post::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post);
        return view('posts.create')->with('post' , $post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRquest $request, Post $post)
    {
        $data = $request->only(['title','description','content']);
        if($request->hasFile('image'))
        {
            $image = $request->image->store('posts');
            $post->deleteImage();

            $data['image'] = $image;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $data['category_id'] = $request->catogery;
        $post->update($data);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
            return redirect(route('trashed-posts'));
        }else{
            $post->delete();
            return redirect(route('posts.index'));
        }
       
    }

    public function trashed(){
      //  $trashed = Post::select("*")->where('deleted_at', '!=', NULL); 
       $trashed = Post::onlyTrashed()->get();
      //  return view('posts.index')->withPosts($trashed);
        return view('posts.trashed')->with('posts',$trashed);
    }

    public function restore($id){
        $trashed = Post::withTrashed()->where('id',$id)->first();
        $trashed->restore();
        session()->flash('success','Post restored successfully');
        return redirect(route('posts.index'));
      }
}
