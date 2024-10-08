@extends('layouts.app')

@section('content')
<h1>Departments</h1>
<a href="{{ route('departments.create')}}" class="btn btn-primary">Add New Department</a>
<ul>
    @foreach ($departments as $department)
    <li>
        {{ $department->name }}
        {{ $department->target }}
        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('departments.destroy', $department->id) }}" method="post" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
    </li>
    @endforeach
</ul>
<a class="btn btn-primary" href="{{url()->previous()}}"> Go Back </a>
@endsection