@extends('auth-layout')

@section('title', 'Register Page')

@section('content')
<main class="form-signin">
  <h1 class="h3 mb-3 fw-normal">Please register</h1>
  <form action="{{ route('auth.user.registration') }}" method="POST">
    @csrf
    <div class="form-floating">
      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
      @if ($errors->has('name'))
      <span>{{ $errors->first('name') }}</span>
      @endif
    </div>

    <div class="form-floating">
      <input type="text" name="email" class="form-control" id="email_address" placeholder="Email">
      @if ($errors->has('email'))
      <span>{{ $errors->first('email') }}</span>
      @endif
    </div>
    
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      @if ($errors->has('password'))
      <span>{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
  </form>
</main>  
@endsection
