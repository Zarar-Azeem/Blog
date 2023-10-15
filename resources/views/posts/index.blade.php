@extends("layout")
@section("content")
    <h2>Homepage</h2>
    @foreach ($posts as $post)
         <div class="post-card">
            <h3 style="font-size: larger">
                <a href="/post/{{$post['id']}}">{{$post->title}}</a>
            </h3>
            <p style="margin-bottom: 1rem">{{$post->text}}</p>
            <p style="font-size: small; font-weight:bolder">By: {{$post->user->username}}</p>
        </div>
        <hr style="margin-top: 1rem">
        @endforeach
@endsection