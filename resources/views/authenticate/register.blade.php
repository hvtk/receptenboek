@extends('auth-layout')

@section('title', 'Register Page')

@section('content')
<div class="container">
  <div class="row" style="margin-top:45px">
    <div class="col-md-4 col-md-offset-4">
        <h4> Register | Custom Auth </h4><br/>
        <form action="" method="POST">
          <div class="form-group">
            <label> Name </label>
            <input type="text" class="form-control" name="name" placeholder="Enter full name.">
          </div>
          <div class="form-group">
            <label> Email </label>
            <input type="text" class="form-control" name="email" placeholder="Enter email address.">
          </div>
          <div class="form-group">
            <label> Password </label>
            <input type="password" class="form-control" name="password" placeholder="Enter password."> 
          </div>  
          <button type="submit" class="btn btn-block btn-primary"> Sign Up </button>
          </br>  
          <a href="{{ route('authenticate.register') }}"> I already have an account, sign in. </a>
        </form>
    </div>
  </div>
</div>
@endsection
