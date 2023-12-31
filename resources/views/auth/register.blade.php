@extends('layouts.app')

@section('content')
<style>
      .main{
        background-color:#823a35;
        color:white;
        height:100vh;
    }
</style>
<div class="container main">
    <div class="row justify-content-center mt-3">
        <div class="card shadow col-lg-6 fw-bolder p-3">

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control py-2" id="name" name="name" placeholder="Name" value="{{ old('name') }}" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group  mb-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control py-2" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group  mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control py-2" id="password" name="password" placeholder="Password" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group  mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control py-2" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" />
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group  mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control py-2" value="{{ old('image') }}" />
                        @error('name')
                        <div style="color: red; font-weight: bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-warning" type="submit">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endsection