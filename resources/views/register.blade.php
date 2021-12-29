<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Register Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
   
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>
<body class="antialiased">
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
</body>
</html>
