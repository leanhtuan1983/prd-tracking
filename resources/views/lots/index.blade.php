@extends('layouts.app')

@section('content')
    <h1>Lot</h1>
    <a href="{{ route('lots.create') }}" class="btn btn-primary">Add New Lot</a>
    <ul>
        @foreach($lots as $lot)
            <li>
                {{ $lot->name }} - (Product: {{ $lot->product->name }}) - Quantity: {{ $lot->quantity}}
                <a href="{{ route('lots.edit', $lot->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('lots.destroy', $lot->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
</div>
@endsection
