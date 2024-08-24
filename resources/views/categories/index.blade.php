@extends('layouts.app')

@section('content')
<div class="container">
    <div class="action-btn">
        <a class="btn btn-primary" href="{{ route('fe.index')}}"> Back to Index </a>
         <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myCreateModal">
        Add new Category</button>       
    </div>
    
    <table class="table table-dark table-hover table-sm">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
       <!-- The Modal Create -->
    <div class="modal" id="myCreateModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create new Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Category Name here..." class="form-control" required>
                    </div>
                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
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
