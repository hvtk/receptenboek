<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title')</title>

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
<body>
  <div class="relative p-4">
      <nav>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/account">Account</a>
        <a href="/dashboard">Logout</a>
      </nav>
  </div>
  <div class="auth">
    @yield('content')
  </div>
</body>
</html>
