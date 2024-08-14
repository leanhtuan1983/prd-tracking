@extends('layouts.app')

@section('content')
<h1>INDEX</h1>
<a href="{{ route('tracking.input')}}" class ="btn btn-primary">Input New Lot</a>
<ul>
    @foreach ($logs as $log )
    <li>
        Lot: {{$log->name}}
       -Product: {{ $log->logs_product->name}}
       -Procedure: {{ $log->logs_procedure->name}} 
       -Department: {{ $log->logs_department->name}}
       -Process: {{ $log->logs_process->name}} 
    </li>
    
    @endforeach
</ul>
@endsection