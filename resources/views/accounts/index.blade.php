@extends('auth-layout')

@section('content')
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    @if (count($accounts) > 0)

        <div>
            <h3> 
                 <a href="{{ route('accounts.show', ['account' => $account['id']])}}">{{$account['full_name']}}</a> 
            </h3>
            <h3> {{$account['email']}} </h3>
            <h3> {{$account['phone']}} </h3>
            <h3> {{$account['street']}} </h3>
            <h3> {{$account['city']}} </h3>
            <h3> {{$account['state']}} </h3>
            <h3> {{$account['zip_code']}} </h3>
        </div>

    @else
        <h2> There is no account information to display </h2>
    @endif   
    
    <div>
        user Input: {{$userInput}}
    </div>
</div>
@endsection