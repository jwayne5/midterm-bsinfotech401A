@extends('products.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Add Product Page</div>
  <div class="card-body">
      
      <form action="{{ url('products/' .$products->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$products->id}}" id="id" />

        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$products->name}}" class="form-control"></br>

        <label>Price</label></br>
        <input type="text" name="price" id="price" value="{{$products->price}}" class="form-control"></br>

        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$products->description}}" class="form-control"></br>

        <label>Image</label></br>
        <input type="text" name="image" id="image" value="{{$products->image}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success">
        <a href="{{route('products.index')}}" class="btn btn-secondary">Cancel</a>

    </form>
   
  </div>
</div>
 
@stop