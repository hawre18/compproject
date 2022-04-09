@extends('v1.template.admin.master')
@section('content')
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
                        <form method="POST" action="/admin/customers/{{$customer->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6"> نام مشتری</label>
                            <input type="text" name="name" value="{{$customer->name}}">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان پروژه مشتری</label>
                            <input type="text" name="title" value="{{$customer->title}}">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">درباره مشتتری</label>
                            <textarea type="text" name="body">{{$customer->body}}</textarea>
                            <div class="form-group">
                                <label>تصویر پروژه</label>
                                <input type="hidden" value="{{$customer->image->id}}" name="imageo"><img src="{{asset('storage/images/customers/'.$customer->image->path)}}">
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">تصویر جدید پروژه</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="hidden" name="customer_image" id="customer-image" value="{{$customer->image_id}}">
                                    <div id="photo" class="dropzone"></div>
                                </div>
                            </div>
                                <label class="form-label">تاریخ شروع همکاری (شمسی)</label>
                                <input type="text"  class="form-control" value="{{$customer->start_date}}" name="start_date" required>
                            @if ($customer->status==1)
                            <div class="form-group">
                                <label>
                                    <input class="with-gap" value="1" name="status" type="radio" checked id="hok"  onclick="hok1()"/>
                                    <span>در حال همکاری</span>
                                </label>
                                <label>
                                    <input class="with-gap" value="0" name="status" type="radio" id="hok2"  onclick="hok1()"/>
                                    <span>اتمام مکاری</span>
                                </label>
                            </div>
                            @else
                            <div class="form-group">
                                <label>
                                    <input class="with-gap" value="1" name="status" type="radio" id="hok"  onclick="hok1()"/>
                                    <span>در حال همکاری</span>
                                </label>
                                <label>
                                    <input class="with-gap" value="0" name="status" type="radio" id="hok2"  onclick="hok1()" checked/>
                                    <span>اتمام مکاری</span>
                                </label>
                            </div>
                            @endif
                            <div class="form-group form-float" id="end_date">
                                <div class="form-line input-group">    
                                <input type="text"  class="form-control" value="{{$customer->end_date}}" name="end_date">
                                <label class="form-label">تاریخ پایان همکاری (شمسی)</label>
                            </div>
                            <button type="submit">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
@endsection
@section('ckdrop')
<script type="text/javascript" src="{{asset('assets/v1/admin/js/dropzone.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/v1/admin/js/ckeditor/ckeditor.js')}}"></script>
<script>
    const hok = document.querySelector('#hok');
    const hok2 = document.querySelector('#hok2');

    hok.addEventListener('change', hok1);
    hok2.addEventListener('change', hok1);

    function hok1() {
        if (document.getElementById("hok2").checked) {
            document.getElementById("end_date").style.display = "block";
        } else {
                document.getElementById("end_date").style.display = "none";
            }
    }
</script>
<script>
Dropzone.autoDiscover=false;
var drop = new Dropzone('#photo', {
        addRemoveLinks: true,
        maxFiles: 1,
        url: "{{ route('article.image') }}",
        sending: function(file, xhr, formData){
          formData.append("_token","{{csrf_token()}}")
        },
        success: function(file, response){
          document.getElementById('article-image').value = response.article_image
        }
      });
        removeImages=function (id) {
            var index=photo.indexOf(id)
            photo.splice(index,1);
            document.getElementById('updated_photo_'+id).remove();
        }
        CKEDITOR.replace('body',{
            customConfig:'config.js',
            toolbar:'simple',
            language:'fa',
            removePlugins:'cloudservices, easyimage'
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
