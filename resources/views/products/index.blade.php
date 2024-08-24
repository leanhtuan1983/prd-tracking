@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <!-- Button to Open the Modal -->
    
    <div class="action-btn">
        <a class="btn btn-primary" href="{{ route('fe.index')}}"> Back to Index </a>
         <!-- Button to Open the Modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new product</button>     
    </div>



    <table class="table table-dark table-hover table-sm">
        <thead>
            <tr style="text-align:center;">
                <th>Product Name</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products  as $product )
            <tr style="text-align:center;">
                <td>{{ $product -> name }}</td>
                <td>{{ $product->category->name }}</td>
                <th>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </th>
            </tr>
            @endforeach
            
           
            
        </tbody>
    </table>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add new Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" id="price" name="price" class="form-control" value="1">
            </div>
         <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Save</button>
            </div>
        </form>
        </div>
        </div>
    </div>
  </div>


  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
@endsection
