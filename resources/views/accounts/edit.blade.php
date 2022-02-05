@extends('main-layout')

@section('title', 'Update a account')

@section('content')
<link href="css/account.css" rel="stylesheet">
<div class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <form method="POST" action="{{ route('accounts.update', ['account' => $account->id]) }}">

                                    @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif

                                    @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                    @endif
                                    
                                    @csrf
                                    @method('PUT')
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name" value="{{ $account->full_name }}" name="fullName">
                                            @error('fullName')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email ID" value="{{ $account->email }}"  name="email">
                                            @error('email')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number" value="{{ $account->phone }}" name="phone">
                                            @error('phone')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="street">Street</label>
                                                <input type="name" class="form-control" id="street" placeholder="Enter Street" value="{{ $account->street }}" name="street">
                                                @error('street')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="name" class="form-control" id="city" placeholder="Enter City" value="{{ $account->city }}" name="city">
                                                @error('city')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" id="state" placeholder="Enter State" value="{{ $account->state }}" name="state">
                                                @error('state')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="zipCode">Zip Code</label>
                                                <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="{{ $account->zip_code }}" name="zipCode">
                                                @error('zipCode')
                                                <div>
                                                    {{ $message }}
                                                </div>    
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>  
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('accounts.destroy', $account->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection