@extends('layouts.app')

@section('content')
<style>
    .main{
        background-color:#823a35;
        color:white;
        height:100vh;
        width:100%;

    }
    .card{
        background-color:#a1625d;
    }

</style>   
<div class="container d-flex align-items-center justify-content-center mt-5">


    <div class="card p-4 m-5" style="width: 500px;">
        <div class="card-body">
            <h1 class="card-title text center">Update {{$branch->name}} branch</h1>

            <form method="post" action="{{ route('branches.update', $branch->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $branch->name }}">
                    @error('name')
                    <div style="color: red; font-weight: bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning mb-3" style="width: 200px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection