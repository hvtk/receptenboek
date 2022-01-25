@extends('main-layout')

@section('title', 'Image upload Page')

@section('content')

<div class="container mt-5">
 
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="card">
    
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ url('save') }}" >
                    
                <div class="row">
    
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="image" placeholder="Choose image" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>     
            </form>
    
        </div>
    
    </div>
    
</div>

@endsection