@extends('layouts.app')

@section('content')
<h1>INDEX</h1>
<a href="{{ route('tracking.input')}}" class ="btn btn-primary">Input New Lot</a>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Lot</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Procedure</th>
            <th>Department</th>
            <th>Process</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($logs as $log )
        <tr>
            <td>{{ $log->name }}</td>
            <td>{{ $log->logs_product->name }}</td>
            <td>{{ $log->logs_lot->quantity }}</td>
            <td>{{ $log->logs_procedure->name }} </td>
            <td>{{ $log->logs_department->name }}</td>
            <td>{{ $log->logs_process->name }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    new DataTable('#example');
</script>
@endsection