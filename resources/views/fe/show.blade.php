@extends('layouts.app')

@section('content')


@if($data->isNotEmpty())

<h1>LOT: {{ $data[0]->name }} - PRODUCT: {{ $data[0] -> logs_product->name }}</h1>
<div class="container">
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
</div> 
@else
    <p>Không có dữ liệu để hiển thị.</p>
@endif

@endsection