@extends('cms.parent')

@section('title',__('cms.admins'))

@section('styles')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endsection

@section('large-page-name',__('cms.index'))
@section('main-page-name',__('cms.appointments'))
@section('small-page-name',__('cms.index'))

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>{{__('cms.patient_name')}}</th>
                  <th>{{__('cms.date')}}</th>
                  <th>{{__('cms.time')}}</th>
                  <th>{{__('cms.emergency')}}</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($appointments as $appointment)
                <tr>
                  <td>{{$appointment->id}}</td>
                
                  <td>{{$appointment->patient->name}}</td>

                  
                  <td>{{$appointment->date}}</td>
                  <td>{{$appointment->time}}</td>
                  <td><span class="badge @if($appointment->emergency) bg-success @else bg-danger @endif">{{$appointment->active_status}}</span>
                  </td>
                  <!-- <td>
                    <div class="btn-group">
                      <a href="{{route('appointments.edit',$appointment->id)}}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" onclick="confirmDelete('{{$appointment->id}}',this)" class=" btn btn-danger">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td> -->
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script>
  // function confirmDelete(id,reference) {
  //   Swal.fire({
  //     title: 'Are you sure?',
  //     text: "You won't be able to revert this!",
  //     icon: 'warning',
  //     showCancelButton: true,
  //     confirmButtonColor: '#3085d6',
  //     cancelButtonColor: '#d33',
  //     confirmButtonText: 'Yes, delete it!'
  //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       performDelete(id,reference);
  //     }
  //   });
  // }

  // function performDelete(id,reference) {
  //   axios.delete('/cms/admin/admins/'+id)
  //   .then(function (response) {
  //       //2xx
  //       console.log(response);
  //       toastr.success(response.data.message);
  //       reference.closest('tr').remove();
  //   })
  //   .catch(function (error) {
  //       //4xx - 5xx
  //       console.log(error.response.data.message);
  //       toastr.error(error.response.data.message);
  //   });    
  // }
</script>
@endsection