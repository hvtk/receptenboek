@extends('layout')

@section('title', 'Logout Page')

@section('content')
<div class="form-signin" style="max-widht: 500px">
  <a href="{{ route('auth.logout') }}">Sign-out</a>
</div> 
@endsection
