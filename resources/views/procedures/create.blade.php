@extends('layouts.app')

@section('content')
<h1>Add new Procedure</h1>
<form action="{{ route('procedures.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Procedure Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection