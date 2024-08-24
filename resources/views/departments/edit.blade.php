@extends('layouts.app')
@section('content')
<h1>Edit Department</h1>
<form action="{{ route('departments.update', $department->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Department Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $department->name }}" required>
    </div>
    <div class="form-group">
        <label for="target">Target</label>
        <input type="number" id="target" name="target" class="form-control" value="{{ $department->target }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection