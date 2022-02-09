@extends('main-layout')

@section('content')
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    @if (count($accounts) > 0)

        @foreach ($accounts as $account)

        <div>
            <h3> 
                 <a href="{{ route('personalData.show', ['personalData' => $personalData['id']])}}">{{$personalData['full_name']}}</a> 
            </h3>
            <div>
            <ul>
                <li>
                Name: {{$personalData['full_name']}} 
                </li>
                <li>
                Email adress: {{$personalData['email']}}
                </li>
                <li>
                Phone number: {{$personalData['phone']}} 
                </li>
                <li>
                Address:  {{$personalData['street']}} 
                </li>
                <li>
                City:  {{$personalData['city']}} 
                </li>
                <li>
                State:  {{$personalData['state']}}
                </li>
                <li>
                Zip code: {{$personalData['zip_code']}}
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