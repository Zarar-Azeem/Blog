<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input;

class CommentController extends Controller
{   
    public function store(Request $request,$id){
        
        $incoming = $request->validate([
            'cmt_text'=>'required'
        ]);
        $incoming['cmt_text'] = strip_tags($incoming['cmt_text']);
        $incoming['user_id'] = Auth::id();
        $incoming['post_id'] = $id;
        Comment::create($incoming);
        return redirect()->route('singlepost', ['id'=>$id]);
    }
    
}
