@extends('layouts.app')
@section('content')

<nav class="navbar bg-body-tertiary justify-content-end me-5">
<div class="container-fluid d-flex justify-content-center ">
    <h1>Welcome NameOfCust</h1>
 </div> 
<span>  
<div class="input-group d-flex "role="search">
    
    <div class="form-floating ">
      <input class="form-control " type="search" placeholder="Search" >
  </div>
  <span class="input-group-text w-25 ">
      <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" id="IconChangeColor"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" id="mainIconPathAttribute"></path> </svg>
</span>
</div>
      </span>
    </form>
  </div>
</nav>




<div class="row">
    <div class="col ms-5">
<main>
  <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white w-50" style="">
    <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
      <!-- <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg> -->
      <span class="fs-2 fw-semibold">Shopping Cart</span>
    </a>
    <div class="list-group list-group-flush border-bottom ">
    
      <a href="#" class="list-group-item list-group-item-action ">
<table class="table table-dark text-center ">
  <thead>
    <th>Product</th>
      <th>Quantity</th>
      <th>Total Price</th> 
      <th></th> 
    </thead>
  <tbody>
    <tr>
      <th scope="row">Coffee</th>
      <td  class="table-active d-flex justify-content-center">
        <div class="border-5 bg-danger w-100  rounded text-center">
            <button class="btn btn-warning-outline border-0 fs-5 fw-bold">-</button>
            <button class="btn btn-warning-outline border-0 disabled fs-5">1</button>
            <button class="btn btn-warning-outline border-0 fs-5 fw-bold">+</button>
        </div>
      </td>
      <td>25 EGP</td>
      <td>            
        <button class="btn  text-danger">X</button>
    </td>

    </tr>
    <tr>
      <th scope="row">Coffee</th>
      <td  class="table-active d-flex justify-content-center">
      <div class="border-5 bg-danger w-100  rounded text-center">
            <button class="btn btn-warning-outline border-0 fs-5 fw-bold">-</button>
            <button class="btn btn-warning-outline border-0 disabled fs-5">1</button>
            <button class="btn btn-warning-outline border-0 fs-5 fw-bold">+</button>
        </div>
      </td>
      <td>25 EGP</td>
      <td>
      <button class="btn  text-danger">X</button>

      </td>

    </tr>
  </tbody>
</table>

<h3>Notes</h3>
<textarea name="notes" id="" cols="79" rows="5" class="w-100"></textarea>
<div class="d-flex align-items-center">

    <h3>Address</h3>
    <div class="btn-group">
  <button class="btn btn-secondary btn-lg dropdown-toggle ms-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Branch
  </button>
  <ul class="dropdown-menu">
    <li>Zayed</li>
    <li>New Cairo</li>
    <li>Nasr City</li>
  </ul>
</div>
</div>

<hr >
<div class="d-flex flex-column align-items-end">


<p class="fs-3 ">55 EGP</p> 
<button class="btn btn-danger float-end">Confirm</button></div> 
</a>
    </div>
  </div>
  </div>
    
   <div class="col">

 <h4 class="mt-5">Latest Order</h4>
   <div class="container text-center mt-3 ">
  <div class="row row-cols-2">
    <div class="col">
        <img src="https://placehold.co/200x150" alt="">
        <p>Tea</p>
    </div>
    <div class="col">
    <img src="https://placehold.co/200x150" alt="">
    <p>Tea</p>

    </div>
    
    <div class="col">Column</div>
    <div class="col">Column</div>
  </div>
</div>

<hr>

<div class="container text-center mt-3 ">
  <div class="row row-cols-2">
    <div class="col">Column</div>
    <div class="col">Column</div>
    <div class="col">Column</div>
    <div class="col">Column</div>
  </div>


  </div>
 </div>

</main>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="">
    /* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

</script>

@endsection