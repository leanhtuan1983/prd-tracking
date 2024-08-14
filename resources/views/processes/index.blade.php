@extends('layouts.app')

@section('content')
 <h1>Processes</h1>
 <a href="{{ route('processes.create')}}" class="btn btn-primary">Add New Process</a>
 <ul>
    @foreach($processes as $process )
    <li>
        {{ $process->name }} - Procedure: {{ $process->department->name }} - Department: {{ $process->departments->name }}
        <a href="{{ route('processes.edit', $process->id) }}" class = "btn btn-secondary">Edit</a>
        <form action="{{ route('processes.destroy', $process->id) }}"  method="post" style ="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>    
    </li>
    @endforeach
 </ul>
@endsection