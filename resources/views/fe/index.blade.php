<!-- LIỆT KÊ TẤT CẢ CÁC SẢN PHẨM ĐƯỢC INPUT -->
@extends('layouts.app')
@section('content')

<div class="menuDept">
    @foreach ($subMenus as $sub )
     <div class="menuDeptItem">
        <a href="{{ route('fe.dept',$sub->id)}}">{{ $sub -> name}}</a>
     </div>         
    @endforeach
</div>

<table class="product-table">
    <thead>
        <tr style="text-align: center;">
            <th>Lot</th>
            <th>Product</th>
            <th>Quantity (sheets)</th>
            <th>Procedures</th>
            <th>Status</th>
            <th>View details</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log )
        <tr style="text-align: center;">
            <td>{{$log->name}}</td>
            <td>{{ $log->logs_product->name }}</td>
            <td>{{ $log->logs_lot->quantity }}</td>
            <td>{{ $log->logs_procedure->name }}</td>
            <td>
                <div id="statusBox" value = {{ $log->status }}>
                    @if ($log->status == 1)
                        Pending
                    @elseif ($log->status == 3)
                        Completed
                    @elseif ($log->status >= 1 && $log->status <= 3)
                        Processing
                    @else
                        Unknown
                    @endif
                </div>           
            </td>           
            <td ><a href="{{ route('fe.show',$log->lot_id) }}"><i class="bi bi-eye"></i></a></td>
        </tr>
        @endforeach              
        </tbody>
    </table>
@endsection