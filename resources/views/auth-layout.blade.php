<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Receptenboek">
    <meta name="author" content="Henk van 't Kruijs">
    <title>@yield('title')</title>
   
    <style>
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
        <a href="{{ route('auth.login') }}">Login</a>
        <a href="{{ route('auth.register') }}">Register</a>
        <a href="{{ route('accounts.index') }}">Account</a>
        <a href="{{ route('auth.dashboard') }}">Logout</a>
      </nav>
  </div>
  <div class="auth">
    @yield('content')
  </div>
</body>
</html>
