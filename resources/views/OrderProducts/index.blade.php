@extends('layouts.app')
@section('content')
<style>
  .row {
    background-color: #823a35;
    width: 100%;
  }

  textarea {
    width: 100%;
    height: 100px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    /* resize: none; */
  }

  .naving {
    background-color: #823a35;
  }

  .table-light tr,
  textarea,
  select,
  input[type='text'] {
    background-color: #a1625d;
    color: white;
  }

  .pagination .page-item.active .page-link {
    background-color: #ffc107;
    border-color: #ffc107;
    color: black;
  }
</style>
<nav class="navbar  justify-content-end  naving">
  <div class="container d-flex justify-content-center mt-5">
  @if (Auth::user()==null)
  @elseif(Auth::user()!=null)
  <h1 class="text-white">Welcome {{Auth::user()->name }}</h1>
  @else 
    @foreach ($users as $user )
      @if ($user->google_id!=null)
      <h1 class="text-white">Welcome {{$user->name }}</h1>
      <?php
      $googleLogin = false;
      ?>
  @endif
    @endforeach
  @endif  

    <nav class="navbar  justify-content-end w-100">
      <div class="container-fluid d-flex justify-content-center ">
        <h1 class="fw-bolder fs-1 text-center text-warning">Enjoy Your Coffee </h1>


      </div>
      <form action="{{ route('order-products.index') }}" method="GET">
        @csrf
        <div class="d-flex ">
          <input class="form-control" type="text" name="keyword" placeholder="Enter a keyword" value="{{ request('keyword') }}">
          <button class="btn btn-warning" type="submit">Search</button>
        </div>

      </form>
  </div>
</nav>
<div class="row">

  <div class="container shop">
    <div class="row mt-4 py-3  ">

      <div class="col-md-6">
        @if((Auth::check() && Auth::user()->role === 'admin') )
        <h1 class="ms-5">Add to user</h1>
        <form class="ms-5" action="{{route('cust')}}" method="post" enctype="multipart/form-data">
          @csrf
          <select class="form-select mb-4" name="user" value="{{ old('user') }}">
            @foreach ($users as $user )
            <option value="{{$user->id}}" name="name">{{$user->name}}</option>
            @endforeach
          </select>
          <button class="btn btn-warning float-end" type="submit">Go</button>
        </form>
        @else
        <h4 class="mt-5 m-5 fs-3 fw-bold " style="color:white;">Latest Order</h4>

        @if (!empty($userOrders))
        <div class="container text-center mt-3 ">
          <div class="row row-cols-3">
            @foreach ($userOrders->products as $product)

            <div class="col">
              <img src="{{ asset('images/'.$product->image) }}" class="w-50 h-75 rounded-circle" alt="">
              <p class="fs-4 fw-bold text-white">{{$product->name}}</p>
            </div>
            @endforeach

          </div>
        </div>
        @else
        <h5 class="m-5 text-primary">You didn't order anything yet</h5>
        <hr>
        @endif
        @endif

        </form>
        <div class="container text-center mt-3 ms-5">
          <div class="row row-cols-1 row-cols-md-3 ">
            @foreach ($products as $prd)
            <div class="col-lg-4 col-md-6 mb-4">
              <form action="{{route('order-products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
                  <div class="">
                    <input name="productId" type="hidden" value="{{$prd->id}}">

                    <button type="submit" class="border-0" onclick="">
                      <img src="{{asset("/images/$prd->image")}}" class=" " alt="order_image" style="height:10rem; width:10rem; object-fit:cover;">
                    </button>
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-center align-items-start h-50">
                        <h5><span class="badge bg-light pt-2 ms-3 mt-3 text-dark" name="name" value="{{ $prd->name }}">{{ $prd->name }}</span></h5>
                        <h5><span class="badge bg-light pt-2 ms-5 mt-3 text-dark" name="price" value="{{ $prd->price }}">{{ $prd->price }} EGP</span></h5>
                      </div>
                    </div>
                  </div>
                  <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                  </div>
                </div>
              </form>
            </div>                        
            @endforeach            
          </div>
        </div>
        <nav>
          <ul class="pagination justify-content-center">
            {{ $products->links() }}
          </ul>
        </nav>
      </div>


      <div class="col-lg-3 col-12 ms-5 me-5 ms-auto p-5">
        <main>
          <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="">
            <svg class="bi me-2" width="30" height="24">
              <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-2 fw-semibold" style="color: #faceca">Shopping Cart</span>
            <div class="list-group list-group-flush border-bottom ">

              <table class="table text-center mt-3 table-light">
                <thead>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th></th>
                </thead>
                <tbody id="table_body">

                  @foreach ($cart as $item)
                  <tr>
                    <th scope="row">{{$item->product->name}}</th>
                    <td class="table-active d-flex justify-content-center">

                      <div class="d-flex justify-content-center">
                        <form action="{{ route('order-products.update', $item['id']) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="submit" value="-" name="remove" class="btn btn-warning">
                        </form>


                        <button class="btn btn-warning-outline border-0 disabled fs-5">{{$item['quantity']}}</button>


                        <form action="{{ route('order-products.update', $item['id']) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="submit" value="+" name="add" class="rounded btn btn-warning">
                        </form>

                      </div>
                    </td>
                    <td>{{$item->product->price}} EGP</td>
                    <td>

                      <form action="{{route('order-products.destroy', $item['id'])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="X" class="btn btn-warning">
                      </form>
                    </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>


              <div class="d-flex flex-column align-items-end">
                <form action="{{route('process-data')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h3 style="color: #faceca">Notes</h3>
                  <textarea name="notes" type="submit" id="" cols="79" rows="5" class="w-100">{{old('notes')}}</textarea>

                  <div class=" align-items-center ">

                    <h3 style="color: #faceca">Branch</h3>
                    <select class="form-select mb-4" name="branch">
                      @foreach($branches as $branch)
                      <option value="{{$branch->id}}">{{$branch->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <br>
                  <hr>

                  <p class="fs-3 " id="amount" style="color: #faceca">{{$amount}} EGP</p>

                  <form action="{{route('process-data')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (empty($cart))
                    <button class="btn btn-warning float-end" value="done" disabled id="confirmBtn" >Confirm</button>
                    @else
                    <button class="btn btn-warning float-end" value="done" id="confirmBtn" >Confirm</button>
                    @endif

                  </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="text-center p-4 text-white" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="#">Cafeteria.com</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="">
      /* global bootstrap: false */
      (function() {
        'use strict'
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
          new bootstrap.Tooltip(tooltipTriggerEl)
        })
      })()
    </script>

    @endsection