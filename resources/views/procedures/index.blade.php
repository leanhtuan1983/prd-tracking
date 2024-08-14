@extends('layouts.app')

@section('content')
    <h1>Procedures</h1>
    <a href="{{ route('procedures.create') }}" class="btn btn-primary">Add New Procedure</a>
    <ul>
        @foreach($procedures as $procedure)
            <li>
                {{ $procedure->name }}
                <a href="{{ route('procedures.edit', $procedure->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('procedures.destroy', $procedure->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
