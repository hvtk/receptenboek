@extends('account-layout')

@section('content')
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    @if (count($accounts) > 0)

        @foreach ($accounts as $account)

        <div>
            <h3> 
                 <a href="{{ route('accounts.show', ['account' => $account['id']])}}">{{$account['full_name']}}</a> 
            </h3>
            <div>
            <ul>
                <li>
                Name: {{$account['full_name']}} 
                </li>
                <li>
                Email adress: {{$account['email']}}
                </li>
                <li>
                Phone number: {{$account['phone']}} 
                </li>
                <li>
                Address:  {{$account['street']}} 
                </li>
                <li>
                City:  {{$account['city']}} 
                </li>
                <li>
                State:  {{$account['state']}}
                </li>
                <li>
                Zip code: {{$account['zip_code']}}
                </li>
            </ul>
        </div>

        @endforeach

    @else
        <h2> There is no account information to display </h2>
    @endif   
    
    <div>
        user Input: {{$userInput}}
    </div>
</div>
@endsection