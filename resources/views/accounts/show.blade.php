@extends('main-layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

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
    
</div>
@endsection