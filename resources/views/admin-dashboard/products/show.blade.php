@extends('layouts.app')
@section('content')

<head>

    <title>SB Admin 2 - Show Product</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/admin-dashboard/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/admin-dashboard/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('admin-dashboard.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            @include('admin-dashboard.topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">

    <h1 class="fs-1 fw-bolder text-capitalize my-3">{{$product->name}} product details</h1>
    <div class="row">
        <div class="card col-md-8 p-0 shadow my-3">
            <div class="row g-0">
                <div class="col-md-4 ">
                    <img src="{{asset("/images/$product->image")}}" class="img-fluid rounded-start " style="width:100%;height:100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h3 class="card-title fs-1 mb-4">{{$product->name}}</h3>
                        <h4 class="card-title">{{$product->price}} EGP</h4>
                        @if($product->category)
                        <h5 class="card-title">Category: <a href="{{ route('categories.show', $product->category_id) }}">{{$product->category->name}}</a></h5>
                        @endif
                        <h5 class="card-title">Created at: {{$product->created_at}}</h5>
                        <!-- <h5 class="card-title">Updated at: {{$product->updated_at}}</h5> -->
                        <a href="{{url('admin/dashboard/products/' . $product->id . '/edit')}}" class="btn btn-warning text-black px-3 my-3">Edit</a>


                        <form action="{{url('admin/dashboard/products/' . $product->id)}}" method="post" class="d-inline ms-3">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger">
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <br>
    <div class="">
        <a href="{{route('products.index')}}" class="btn btn-warning text-black text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg><span class="ms-2">Back to all products</span></a>
    </div>
</div>
</div>
</div>
</div>
<!-- <div class="owl-carousel">
    @foreach($products as $product)
        <div class="item">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
        </div>
    @endforeach
</div> -->
@include('admin-dashboard.scripts')
</body>
@endsection