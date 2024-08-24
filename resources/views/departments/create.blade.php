@extends('layouts.app')

@section('content')
<h1>Add New Department</h1>
<form action="{{ route('departments.store') }}"method="post">
    @csrf
    <div class="form-group">
        <label for="name">Department Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
        <label for="target">Target</label>
        <input type="text" id="target" name="target" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection