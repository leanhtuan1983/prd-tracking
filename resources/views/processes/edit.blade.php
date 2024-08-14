@extends('layouts.app')

@section('content')
<h1>Edit Process</h1>
<form action="{{ route('processes.update', $process->id) }}" method ="post">
 @csrf
 @method('PUT')
 <div class="form-group">
    <label for="name">Process Name</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ $process->name}}" required>
 </div>
 <div class="form-group">
    <label for="dept_id">Department</label>
    <select id="dept_id" name="dept_id" class="form-control" required>
        @foreach ($departments as $department )
        <option value="{{ $department->id }}" {{ $department->id == $process->dept_id_id ? 'selected' : ''}}>{{ $department->name}}</option>      
        @endforeach
    </select>
 </div>
 <div class="form-group">
    <label for="procedure_id">Procedure</label>
    <select id="procedure_id" name="procedure_id" class="form-control" required>
        @foreach ($procedures as $procedure )
        <option value="{{ $procedure->id }}" {{ $procedure->id == $process->procedure_id ? 'selected' : ''}}>{{ $procedure->name}}</option>      
        @endforeach
    </select>
 </div>
 <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection