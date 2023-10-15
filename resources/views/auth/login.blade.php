@extends("layout")

@section("content")
<div class="form-container">
    <form class="form" action="/login-user" method="post">
        @csrf
        <h1>Login</h1>
        
        <input name='email' type="email" value="{{ old('email') }}" placeholder="Email">
        <span class="error">@error('email') {{$message}} @enderror</span>

        <input name='password' type="password" value="{{ old('password') }}" placeholder="Password">
        <span class="error">@error('password') {{$message}} @enderror</span>

        <button class="submit">Submit</button>
    </form>
</div>
@endsection