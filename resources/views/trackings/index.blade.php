@extends('layouts.app')

@section('content')

    <div class="action-btn">
        <a class="btn btn-primary" href="{{ route('fe.index')}}">Back to Index </a>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputLotModal">
        Input lot</button>
    </div>

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
    <!-- The Modal -->
    <div class="modal" id="inputLotModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Input Lot</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('tracking.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Lot</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="procedure_id">Procedure</label>
                        <select id="procedure_id" name="procedure_id" class="form-control" required>
                            @foreach($procedures as $procedure)
                                <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>               
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    new DataTable('#example');
</script>
@endsection