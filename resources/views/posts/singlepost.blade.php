@extends("layout")
@section("content")
<h2>{{$post->title}}</h2>
<div class="post-card">
    <p style="font-size: large; font-weight:bolder; margin-bottom:1rem;">By: {{$post->user->username}}</p>
    <p style="margin-bottom:1rem">{{$post->text}}</p>
    <hr> 
</div>
@endsection
