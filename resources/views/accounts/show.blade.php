@extends('account-layout')

@section('content')
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div>
        <h3> {{$account['full_name']}} </h3>
        <h3> {{$account['email']}} </h3>
        <h3> {{$account['phone']}} </h3>
        <h3> {{$account['street']}} </h3>
        <h3> {{$account['city']}} </h3>
        <h3> {{$account['state']}} </h3>
        <h3> {{$account['zip_code']}} </h3>
    </div>
    
</div>
@endsection