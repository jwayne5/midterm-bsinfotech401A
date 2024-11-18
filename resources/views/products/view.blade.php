@extends('products.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Products Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $products->name }}</h5>
        <p class="card-text">Price : {{ $products->price }}</p>
        <p class="card-text">Description : {{ $products->description }}</p>
        <p class="card-text">Image : {{ $products->image }}</p>
  </div>
       
    </hr>
  
  </div>
</div>