@extends('v1.template.admin.master')
@section('alert')
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table id="tableExport" class="display table table-hover table-checkable order-column m-t-20 width-per-100 text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">نام کاربر</th>
                                        <th class="text-center">ایمیل </th>
                                        <th class="text-center">سطح</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        @if ($user->level=='admin')
                                            <td class="text-center"><span class="label label-success">مدیر</span></td>
                                        @else
                                        <td class="text-center"><span class="label label-warning">کاربر عادی</span></td>
                                        @endif
                                        <td>
                                            <a href=""class="button1" data-id="{{$user->id}}"class="btn tblActnBtn"><i class="material-icons">mode_edit</i></a>
                                            <a href="" class="button" data-id="{{$user->id}}"class="btn tblActnBtn"><i class="material-icons">mode_delete</i></a>
                                        </td>
                                    </tr> 
                                    @endforeach
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
@endsection
@section('sweet')
<script>
    $(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    
    swal({
            title: "از حذف کاربر موردنظر مطمئن هستید؟",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "بله",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                
                url: "{{url('admin/users/delete')}}"+'/'+id,
                method: "POST",
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                                                                                                                                                                                                
     },
                success: function () {
                              swal({
                                title: "حذف با موفقیت انجام شد!",
                                icon: "success",

                            });
                            window.location.reload(true);
                    },

            });
    });
});
  </script>
  <script>
    $(document).on('click', '.button1', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    
    swal({
            title: "از تبدیل وضعیت کاربر عادی به ادمین مطمئن هستید؟",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "بله",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                
                url: "{{url('admin/users/change')}}"+'/'+id,
                method: "POST",
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                                                                                                                                                                                                
     },
                success: function () {
                              swal({
                                title: "تبدیل وضعیت با موفقیت انجام شد!",
                                icon: "success",

                            });
                            window.location.reload(true);
                    },

            });
    });
});
  </script>              
@endsection
@section('script-tables')
    
    <script src="{{asset('assets/v1/admin/js/table.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/v1/admin/js/bundles/export-tables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/v1/admin/js/bundles/export-tables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/v1/admin/js/bundles/export-tables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/v1/admin/js/bundles/export-tables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/v1/admin/js/pages/tables/jquery-datatable.js')}}"></script>
@endsection
