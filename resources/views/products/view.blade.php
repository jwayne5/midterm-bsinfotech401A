@extends('products.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header"><h1>Products Page</h1></div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $products->name }}</h5>
        <p class="card-text">Price : {{ $products->price }}</p>
        <p class="card-text">Description : {{ $products->description }}</p>
        <p class="card-text">Image :
        @if($products->image)
            <img src="{{ asset('storage/' . $products->image) }}" alt="{{ $products->name }}" width="100">
          @endif</br>
        </p>
        <a href="{{route('products.index')}}" class="btn btn-secondary">Close</a>

  </div>
       
    </hr>
  
  </div>
</div>