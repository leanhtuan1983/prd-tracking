@extends('layouts.app')

@section('content')
    <h1>Edit Lot</h1>
    <form action="{{ route('lots.update', $lot->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Lot Code</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $lot->name }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Product</label>
            <select id="product_id" name="product_id" class="form-control" required>
                @foreach($products as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $data->product_id ? 'selected' : '' }}>{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
