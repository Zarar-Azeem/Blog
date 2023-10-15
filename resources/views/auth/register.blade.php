@extends("layout")

@section("content")
<div class="form-container">
    <form class="form" action="/register-user" method="post">
        @csrf
        <h1>Register</h1>

        <input name="username" type="text" value="{{ old('username') }}" placeholder="Username">
        <span class="error">@error('username'){{$message}} @enderror</span>

        <input name="email" type="email" value="{{ old('email') }}"  placeholder="Email">
        <span class="error">@error('email'){{$message}} @enderror</span>

        <input name="password" type="password" value="{{ old('password') }}" placeholder="Password">
        <span class="error">@error('password') {{$message}} @enderror</span>
        
        <button class="submit">Submit</button>
    </form>
</div>
@endsection