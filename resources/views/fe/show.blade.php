@extends('layouts.app')

@section('content')
<div class="product-title"><h2>LOT: {{ $data[0]->name }} - PRODUCT: {{ $data[0] -> logs_product->name }}</h2></div>
<div class="container" style="display: flex; padding-top: 20px">
  <div class="table-detail">
  @if($data->isNotEmpty())
    <table class="product-table">
      <thead>
        <tr>
          <th>Process</th>
          <th>Department</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
        <tr>
          <td>{{ $item->logs_process->name }}</td>
          <td>{{ $item->logs_department->name }}</td>
          <td><div class="status-element" data-status="{{ $item->logs_status->status }}">{{ $item->logs_status->status }}</div></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>Không có dữ liệu để hiển thị.</p>
    @endif
  </div>
  <div class="chartView">
      <canvas id="chartView"></canvas>
  </div> 
 
</div>
<script>
        var completeData = {{ $completeData }};
        var totalData = {{ $totalData }};
</script>
 <!-- Gọi hàm JavaScript để cập nhật màu nền cho tất cả các element có class 'status-element' -->
 <script>   
    updateBackgroundColors('status-element');
</script>
@endsection