@extends('main-layout')

@section('title', 'Register Page')

@section('content')
<div class="container">
  <div class="row" style="margin-top:45px">
    <div class="col-md-4 col-md-offset-4">
        <h4> Register | Custom Auth </h4><br/>
        <form action="{{ route('authenticate.save') }}" method="POST">

          @if(Session::get('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
          @endif

          @if(Session::get('fail'))
          <div class="alert alert-danger">
            {{ Session::get('fail') }}
          </div>
          @endif

          @csrf
          <div class="form-group">
            <label> Name </label>
            <input type="text" class="form-control" name="name" placeholder="Enter full name." value="{{ old('name') }}">
            <span class="text-danger"> @error('name'){{ $message }} @enderror</span>
          </div>
          <div class="form-group">
            <label> Email </label>
            <input type="text" class="form-control" name="email" placeholder="Enter email address." value="{{ old('email') }}">
            <span class="text-danger"> @error('email'){{ $message }} @enderror</span>
          </div>
          <div class="form-group">
            <label> Password </label>
            <input type="password" class="form-control" name="password" placeholder="Enter password."> 
            <span class="text-danger"> @error('password'){{ $message }} @enderror</span>
          </div>  
          <button type="submit" class="btn btn-block btn-primary"> Sign Up </button>
          </br>  
          <a href="{{ route('authenticate.login') }}"> I already have an account, sign in. </a>
        </form>
    </div>
  </div>
</div>
@endsection
