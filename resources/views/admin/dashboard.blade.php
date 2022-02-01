@extends('main-layout')

@section('title', 'Dashboard Page')

@section('content')
<div class="container">
  <div class="row" style="margin-top:45px">
    <div class="col-md-4 col-md-offset-4">
        <h4> Dashboard </h4><br/>
        <table class="table table-hover">
          <thead>
            <th> Name </th>
            <th> Email </th>
            <th></th>
          </thead>  
          <tbody>
            <tr>
              <td>{{ $LoggedUserInfo['name'] }}</td>
              <td>{{ $LoggedUserInfo['email'] }}</td>
              <td><a href="{{ route('authenticate.register') }}"> Logout </a></td>
            </tr>  
          </tbody>
        </table>

        <ul>
          <li><a href="/admin/dashboard"> Dashboard </a></li>
          <li><a href="/admin/profile"> Profile </a></li>
          <li><a href="/admin/settings"> Settings </a></li>
          <li><a href="/admin/staff"> Staff </a></li>
        </ul>
    </div>
  </div>
</div>
@endsection
