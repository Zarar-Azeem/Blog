@extends("layout")
@section("content")
<h2>{{$post->title}}</h2>
<div class="post-card">
    <p style="font-size: large; font-weight:bolder; margin-bottom:1rem;">By: {{$post->user->username}}</p>
    <p style="margin-bottom:1rem">{{$post->text}}</p>
        @if (Auth::id() == $post->user->id)
            <div class="utils-btns">
                <a href="/edit/{{$post['id']}}">
                    <button style="background-color:bisque">Edit</button>
                </a> 
                <form action="/delete/{{$post['id']}}" method="post">
                    @csrf
                    <button style="background-color:bisque">Delete</button>
                </form>
            </div>
        @endif
        <hr style="margin-top: 1rem"> 
        <div class="comment-input">
            <form action="/post/{{$post['id']}}/comment" method="post">
                @csrf
                <input class="comment" name="cmt_text" type="text" placeholder="Add a comment">
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="comments-section">
            @foreach ($comments as $comment)
                <div class="single-comment">
                    <small style="font-size: small; font-weight:small; margin-bottom:1rem;">By: {{$comment->user->username}}</small>
                    <p>{{$comment->cmt_text}}</p>
                    
                </div>
            @endforeach
        </div>
    </div>
@endsection
