@extends('main-layout')

@section('content')

<div class="container mt-4">

  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <h2>Laravel 8 Image Upload Tutorial</h2>
    </div>
    <div class="card-body">
      <form name="image-upload" id="image-upload" method="post" action="{{ url('upload') }}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Please Select Image</label>
          <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror form-control">

          @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  
</div>  
@endsection