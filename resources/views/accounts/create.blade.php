@extends('account-layout')

@section('title', 'Create a account')

@section('content')
<div class="container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <form method="POST" action="{{ route('accounts.store') }}">
                            @csrf
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Enter full name" value="{{ old('fullName') }}" name="fullName">
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
                                    <input type="email" class="form-control" id="email" placeholder="Enter email ID" value="{{ old('email') }}"  name="email">
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
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}" name="phone">
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
                                        <input type="name" class="form-control" id="street" placeholder="Enter Street" value="{{ old('street') }}" name="street">
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
                                        <input type="name" class="form-control" id="city" placeholder="Enter City" value="{{ old('city') }}" name="city">
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
                                        <input type="text" class="form-control" id="state" placeholder="Enter State" value="{{ old('state') }}" name="state">
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
                                        <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="{{ old('zipCode') }}" name="zipCode">
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
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection