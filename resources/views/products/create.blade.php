@extends('products.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Add products Page</div>
  <div class="card-body">
      
    <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label>Price</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>

        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>

        <label>Image</label></br>
        <input type="file" name="image" id="image" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{route('products.index')}}" class="btn btn-secondary">Cancel</a>
    </form>
   
  </div>
</div>
 
@stop