@extends('layouts.app')

@section('content')

<h1>Departments</h1>

<ul class="horizontal-menu">
@foreach ($subMenus as $sub )
    
        <li><a href="{{ route('fe.dept',$sub->id)}}">{{ $sub -> name}}</a></li>                   
         
@endforeach
</ul>
<div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>Lot</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Procedures</th>
                    <th>Show details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log )
                <tr>
                    <td>{{$log->name}}</td>
                    <td>{{ $log->logs_product->name}}</td>
                    <td>{{ $log->logs_lot->quantity}}</td>
                    <td>{{ $log->logs_procedure->name}}</td>
                    <td ><a href="{{ route('fe.show',$log->lot_id) }}"><i class="bi bi-eye"></i></a></td>
                </tr>
                @endforeach              
            </tbody>
        </table>
</div>
@endsection