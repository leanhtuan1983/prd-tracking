@extends('layouts.app')

@section('content')

@if($deptData->isNotEmpty())
<div class="product-title"><h1>{{ $deptData[0]->logs_department->name  }}</h1></div>
    <div class="filter-data">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
<div class="table-container">
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
            @php
             $previousData = null;
            @endphp      
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
        @php
            $previousData = $deptItem -> id - 1;
        @endphp         
        </tbody>
    </table>       
</div>

@else
    <p>Không có dữ liệu để hiển thị.</p>
@endif
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