@extends('layouts.app')

@section('content')
    <h1>Add New Lot</h1>
    <form action="{{ route('lots.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Lot Code</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="product_id">Product</label>
            <select id="product_id" name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
