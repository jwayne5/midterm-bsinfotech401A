@extends('products.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Products Crud</h2>
                        <h6>Abarro, Reynaldo Jr.</h6>
                        <h6>Aquino, John Wayne</h6>
                    </div>
                    <div class="card-body">
                        
                        <!-- Add New Product Button (Trigger Modal) -->
                        <a href="#" 
                        class="btn btn-success btn-sm" 
                        data-bs-toggle="modal" 
                        data-bs-target="#addProductModal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <!-- Modal for Adding New Product -->
                        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
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
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                                            @else
                                                No image available
                                            @endif
                                        </td>
 
                                        <td>
                                            
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#productModal-{{ $item->id }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="productModal-{{ $item->id }}" tabindex="-1" aria-labelledby="productModalLabel-{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel-{{ $item->id }}">Product Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <p><strong>Name:</strong> {{ $item->name }}</p>
                                                        <p><strong>Price:</strong> {{ $item->price }}</p>
                                                        <p><strong>Description:</strong> {{ $item->description }}</p>
                                                        <p><strong>Image:</strong></p>
                                                            @if ($item->image)
                                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                                                            @else
                                                                <p>No image available</p>
                                                            @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                        
                                           
                                            <div class="card-header">
                                                <h1>Edit Product Page</h1>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ url('products/' . $products->id) }}" method="post" enctype="multipart/form-data">
                                                    {!! csrf_field() !!}
                                                    @method("PATCH")
                                                
                                                    <!-- Hidden ID -->
                                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                                
                                                    <!-- Product Name -->
                                                    <label for="name">Name</label></br>
                                                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-control"></br>
                                                
                                                    <!-- Product Price -->
                                                    <label for="price">Price</label></br>
                                                    <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="form-control"></br>
                                                
                                                    <!-- Product Description -->
                                                    <label for="description">Description</label></br>
                                                    <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}" class="form-control"></br>
                                                
                                                    <!-- Product Image -->
                                                    <label for="image">Image</label></br>
                                                    <input type="file" name="image" id="image" class="form-control"></br>
                                                
                                                    @if($product->image)
                                                        <div>
                                                            <label>Current Image:</label>
                                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                                                        </div>
                                                    @endif
                                                
                                                    <br/>
                                                    <input type="submit" value="Update" class="btn btn-success">
                                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                                                </form>
                                            </div>

                                            @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td> <!-- Accessing the individual product's ID -->
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->description }}</td>
        <td>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
        </td>
        <td>
            <a href="{{ url('products/' . $product->id) }}" class="btn btn-info btn-sm">View</a>
            <a href="{{ url('products/' . $product->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
        </td>
    </tr>
@endforeach
 
                                            <form method="POST" action="{{ url('/products' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Products" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection