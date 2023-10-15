@extends("layout")
@section("content")
    <div class="create-container">
        <form class="create" action="{{route('store')}}" method="post">
            @csrf
            <h2>Create your post</h2>
            <div><label for="title">Title</label><span class="error">@error('title'){{$message}} @enderror</span></div>
            <input name='title' type="text" value="{{old('title')}}">
            <div><label for="text">Text</label><span class="error">@error('text'){{$message}} @enderror</span></div>
            <textarea name="text" id="text" cols="30" rows="7" value="{{old('text')}}"></textarea>
            <button class='submit' type="submit">Submit</button>
        </form>
    </div>
@endsection