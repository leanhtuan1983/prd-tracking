<!-- LIỆT KÊ TÌNH TRẠNG CỦA CÁC SẢN PHẨM TẠI CÔNG ĐOẠN -->
@extends('layouts.app')
@section('content')
<div class="menuDept">
    @foreach ($subMenu as $sub )
     <div class="menuDeptItem">
        <a href="{{ route('fe.dept',$sub->id)}}">{{ $sub -> name}}</a>
     </div>         
    @endforeach
</div>
<div class="container">
    @if($deptData->isNotEmpty())  
    <div class="product-title"><h1>{{ $deptData[0]->logs_department->name  }}</h1></div>
    
    <div class="viewDetails">     
        
        <div class="table-container">
            <div class="filter-data">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
            <div class="table-detail">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Lot</th>
                        <th>Product</th>
                        <th>Process</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">  
                    @foreach ($deptData as $deptItem)
                    <tr>                  
                        <td>{{ $deptItem -> name }}</td>
                        <td>{{ $deptItem ->logs_product -> name}}</td>
                        <td>{{ $deptItem ->logs_process -> name}}</td>
                        <td><div class="status-element" data-status="{{ $deptItem ->logs_status -> status}}">{{ $deptItem ->logs_status -> status}}</div></td>
                        <td>                 
                        <form action="{{ route('fe.dept.update', $deptItem->id) }}" method="POST">
                        @csrf
                            <button type="submit" class="btn btn-primary" 
                            @if($deptItem -> status_id >= 3) disabled @endif>Update
                            </button>
                        </form>
                        </td>                    
                    </tr>
                    @endforeach         
                </tbody>               
            </table> 
            </div>

                             
        </div>
        <div class="dataProductivity">
            <div class="dataTitle"><h4>OUTPUT (Sheets)</h4></DIV>
            <div class="currentNumber">
               <p>{{ $completedLot }}</p>
            </div>
            <div class="subDetailData">
                <div class="subDetail hourData">
                    <h6>Efficiency (Sheets/h)</h6>
                    {{ $efficiency }}
                </div>
                <div class="subDetail forecastData">
                    <h6>Estimated Output (Sheets)</h6>
                    {{ $estimatedOutput}}
                </div>
                <div class="subDetail targetData">
                     <h6>Target (Sheets)</h6>
                     {{ $target }}
                </div>
                <div class="subDetail percentTarget"></div>
            </div>
        </DI>        
    </div>
    @else
    <p>Không có dữ liệu để hiển thị.</p>
    @endif
 </div>
<button onclick="window.location.href='{{ route('fe.index') }}'" class="btn btn-primary">Back to Index</button>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection