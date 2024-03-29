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
                                <a class="btn btn-success" href="{{route('slides.create')}}" ><i class="material-icons">add</i></a>
                            <table id="tableExport" class="display table table-hover table-checkable order-column m-t-20 width-per-100 text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">عنوان</th>
                                        <th class="text-center">لینک </th>
                                        <th class="text-center">نمایه</th>
                                        <th class="text-center">وضعیت</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slides as $slide)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td class="text-center"><a style="color: black;" href="{{route('slides.show',$slide->id)}}">{{mb_substr($slide->title,0,20)}}</a></td>
                                        <td class="text-center"><a style="color: black;" href="{{route('slides.show',$slide->id)}}">{!!mb_substr($slide->body,0,20)!!}</a></td>
                                        <td class="text-center" style="width: 100px; height:100px;"><a style="color: black;" href="{{route('slides.show',$slide->id)}}"><img src="{{asset('storage/images/slides/'.$slide->image->path)}}"></a></td>
                                        @if ($slide->status==1)
                                            <td class="text-center"><span class="label label-success">فعال</span></td>
                                        @else
                                        <td class="text-center"><span class="label label-warning">غیرفعال</span></td>
                                        @endif
                                        <td>
                                            <a href="{{route('slides.edit',$slide->id)}}"class="btn tblActnBtn"><i class="material-icons">mode_edit</i></a>
                                            <a href="" class="button" data-id="{{$slide->id}}"class="btn tblActnBtn"><i class="material-icons">mode_delete</i></a>
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
            title: "از حذف دیتا موردنظر مطمئن هستید؟",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "بله",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                
                url: "{{url('admin/slides/delete')}}"+'/'+id,
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
