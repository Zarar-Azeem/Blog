<div class="comments-section">
    @foreach ($comments as $comment)
        <div class="single-comment">
            <div style="display: flex; justify-content:space-between;">
            @if ($post->user->username == $comment->user->username)
            <small style="font-size: small; font-weight:small; margin-bottom:1rem;">By:  <strong>Author</strong></small>
            @else
            <small style="font-size: small; font-weight:small; margin-bottom:1rem;">By: <strong>{{$comment->user->username}}</strong></small>
            @endif
            @if (Auth::id() == $comment->user->id)
            <div class="comments-utils">
                <form  action="/post/{{$post['id']}}/comment/{{$comment->id}}" method="post" >
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </div>
            @endif
            </div>
            <div>
                <p name="cmt_text">{{$comment->cmt_text}}</p>
            </div>
        </div>
    @endforeach
</div>