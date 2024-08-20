@extends('layouts.app')

@section('content')
<h1>Input Information</h1>
<form action="{{ route('tracking.store') }}" method="post">
    @csrf
<div class="form-group">
    <label for="name">Lot</label>
    <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
</div>
<div class="form-group">
            <label for="procedure_id">Procedure</label>
            <select id="procedure_id" name="procedure_id" class="form-control" required>
                @foreach($procedures as $procedure)
                    <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                @endforeach
            </select>
</div>
        <button type="submit" class="btn btn-primary">Confirm</button>
</form>
@endsection