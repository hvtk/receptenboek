@extends('layout')

@section('title', 'Login Page')

@section('content')
<main class="form-signin">
  <h1 class="h3 mb-3 fw-normal">Please signin</h1>
  <form action="{{ route('auth.custom.signin') }}" method="POST">
    @csrf
    <div class="form-floating">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
      @if ($errors->has('email'))
      <span>{{ $errors->first('email') }}</span>
      @endif
    </div>
    
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
      @if ($errors->has('password'))
      <span>{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
  </form>
</main>  
@endsection
