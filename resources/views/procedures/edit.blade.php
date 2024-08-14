@extends('layouts.app')

@section('content')
<h1>Edit Procedure</h1>
<form action="{{ route('procedures.update', $procedure->id) }}" method="post">
@csrf
@method('put')
<div class="form-group">
    <label for="name">Procedure Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $procedure->name}}" required>
</div>
<button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection