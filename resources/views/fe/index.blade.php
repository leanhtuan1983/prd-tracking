@extends('layouts.app')

@section('content')
  <table class="product-table">
    <thead>
        <tr>
            <th>Lot</th>
            <th>Product</th>
            <th>Quantity (sheets)</th>
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

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
@endsection