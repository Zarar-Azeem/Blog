<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PostController extends Controller
{
    public function index(){
        return view('posts.index',
         ['posts'=> Post::all(),'comments'=> Comment::all()]);
    }
    public function post($id){
        return view('posts.singlepost',[
            'post'=> Post::findOrFail($id),
            'comments'=>Comment::where('post_id',$id)->get()
        ]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(StorePostRequest $request): RedirectResponse{
        $incoming = $request->validated();
        $incoming['title'] = strip_tags($incoming['title']);
        $incoming['text'] = strip_tags($incoming['text']);
        $incoming['user_id'] = auth()->id();
        Post::create($incoming);

        return redirect('/home');
    }
    public function myPosts(){
        $posts=[];
        if(auth()->check()){
            $posts = auth()->user()->yourposts()->get();
            return view('posts.myposts', ['posts'=>$posts]);
        } else {
            return redirect('/');
        }
        // $posts = Post::where('user_id', auth()->id())->get();
        
    }
    public function edit($id){
        return view('posts.edit' , ['post'=> Post::findOrFail($id)]);
    }

    public function editpost(StorePostRequest $request, $id): RedirectResponse{
        $incoming = $request->validated();
        $post = Post::findOrFail($id);
        $post->update($incoming);
        return redirect('/home');
    }

    public function destroy($id){
  
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('myposts');
    }
}
