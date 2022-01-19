<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Receptenboek">
    <meta name="author" content="Henk van 't Kruijs">
    <!-- Added bootstrap 4 to Laravel 8 -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <title>@yield('title')</title>

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>
  
<body>
  
    @yield('content')
  
</body>
</html>
