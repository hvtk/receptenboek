@extends('main-layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

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
    
</div>
@endsection