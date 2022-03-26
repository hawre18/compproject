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
                        <form method="POST" action="/admin/slides/{{$slide->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان اسلاید</label>
                            <input type="text" name="title" value="{{$slide->title}}">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">لینک</label>
                            <textarea type="text" name="link">{{$slide->link}}</textarea>
                            <div class="form-group">
                                <label>تصویر</label>
                                <input type="hidden" value="{{$slide->image->id}}" name="imageo"><img src="{{asset('storage/images/slides/'.$slide->image->path)}}">
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">تصویر </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="hidden" name="slide_image" id="slide-image" value="{{$slide->image_id}}">
                                    <div id="photo" class="dropzone"></div>
                                </div>
                            </div>
                            @if ($slide->status==1)
                            <div class="form-group">
                                <label>
                                    <input class="with-gap" value="1" name="status" type="radio" checked />
                                    <span>منتشر شده</span>
                                </label>
                                <label>
                                    <input class="with-gap" value="0" name="status" type="radio" />
                                    <span>غیرفعال</span>
                                </label>
                            </div>
                            @else
                            <div class="form-group">
                                <label>
                                    <input class="with-gap" value="1" name="status" type="radio" />
                                    <span>منتشر شده</span>
                                </label>
                                <label>
                                    <input class="with-gap" value="0" name="status" type="radio" checked />
                                    <span>غیرفعال</span>
                                </label>
                            </div>
                            @endif
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
<script>
Dropzone.autoDiscover=false;
var drop = new Dropzone('#photo', {
        addRemoveLinks: true,
        maxFiles: 1,
        url: "{{ route('slides.image') }}",
        sending: function(file, xhr, formData){
          formData.append("_token","{{csrf_token()}}")
        },
        success: function(file, response){
          document.getElementById('slide-image').value = response.slide_image
        }
      });
        removeImages=function (id) {
            var index=photo.indexOf(id)
            photo.splice(index,1);
            document.getElementById('updated_photo_'+id).remove();
        }
        
  </script>           
@endsection
