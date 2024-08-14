@extends('layouts.app')

@section('content')
<h1>Add New Process</h1>
<form action="{{ route('processes.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Process Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="procedure_id">Procedure</label>
        <select name="procedure_id" id="procedure_id" class="form-control" required>
            @foreach ($procedures as $procedure)
            <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="dept_id">Department</label>
        <select name="dept_id" id="dept_id" class="form-control" required>
            @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection