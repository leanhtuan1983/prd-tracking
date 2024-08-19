@extends('layouts.app')

@section('content')
<div class="container">
    <div class="action-btn">
        <a class="btn btn-primary" href="{{ route('fe.index')}}"> Back to Index </a>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
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
</div>
@endsection
