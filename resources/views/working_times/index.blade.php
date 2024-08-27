@extends('layouts.app')

@section('content')
<style>
    .working-time {
        display: flex;
        background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
        height: 200px;
        color: blue;
        font-size: 80px;
    }
    .start-time, .end-time {
        border: 1px solid white;
        margin: 10px;
        width: 800px;
        text-align: center;              
    }

 </style>
<div class="container">
@foreach ($workingTimes as $workingTime )    
<div class="action-btn">
        <a class="btn btn-primary" href="{{ route('fe.index')}}"> Back to Index </a>
        <div class="edit-time-btn"><button 
                        type="button" 
                        class="btn btn-primary"
                        data-bs-toggle="modal" 
                        data-bs-target="#editModal"
                        data-id="{{ $workingTime->id }}"
                        data-start_time="{{ $workingTime->start_time }}"
                        data-end_time="{{ $workingTime->end_time }}"
                    >
                        Edit
                    </button></div>
 </div>   

<div class="working-time">
    <div class="start-time">
    <h4>Start</h4>
    {{ $workingTime -> start_time}}</div>
    <div class="end-time">
    <h4>End</h4>
    {{ $workingTime -> end_time}}</div>
</div>  
@endforeach   
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Time</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')

          <!-- Input cho thời gian -->
          <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
          </div>

          <!-- Các input khác (nếu có) -->
          <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
    

    
           
 
         
         <script>
    // Lắng nghe sự kiện khi modal được mở
    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        // Button kích hoạt modal
        var button = event.relatedTarget;
        
        // Lấy dữ liệu từ các thuộc tính data-*
        var id = button.getAttribute('data-id');
        var star_time = button.getAttribute('data-start_time');
        var end_time = button.getAttribute('data-end_time');
        
        // Điền dữ liệu vào form trong modal
        var modalTitle = editModal.querySelector('.modal-title');
        var star_time = editModal.querySelector('#start_time');
        var end_time = editModal.querySelector('#end_time');
        var form = editModal.querySelector('#editForm');

        modalTitle.textContent = 'Edit Working Time ' + id;
        start_time.value = star_time;
        end_time.value = end_time;

        
        // Cập nhật action URL của form
        form.action = '/working_times/update/' + id;
    });
</script>
@endsection