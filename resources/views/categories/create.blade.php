@extends('layouts.app')
@section('content')

<div class="container d-flex align-items-center justify-content-center mt-5" >
    <div class="card p-4 m-5 shadow" style="width: 500px;">
        <div class="card-body">
            <h1 class="card-title text center fw-bolder">Create New Category</h1>
  

    <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
         @csrf
  
    </div>
        <div class="mb-3">
            <label  class="form-label fw-bolder">Name</label>
            <input type="text" class="form-control" name="name"  value="{{ old('name') }}" >
        </div>
       <div>
       @error('name')
    <div style="color:red; font-weight:bold">{{ $message }}</div>
@enderror
       </div>
   
     
       <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success mb-3" style="width: 200px;">Submit</button>
    </div>
    </form>
</div>
</div>
</div>
@endsection