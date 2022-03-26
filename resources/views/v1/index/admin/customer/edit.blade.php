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
                        <form method="POST" action="/admin/articles/{{$article->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان مقاله</label>
                            <input type="text" name="title" value="{{$article->title}}">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">متن مقاله</label>
                            <textarea type="text" name="body">{{$article->body}}</textarea>
                            <div class="form-group">
                                <label>تصویر مقاله</label>
                                <input type="hidden" value="{{$article->image->id}}" name="imageo"><img src="{{asset('storage/images/article/'.$article->image->path)}}">
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">تصویر مقاله</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="hidden" name="article_image" id="article-image" value="{{$article->image_id}}">
                                    <div id="photo" class="dropzone"></div>
                                </div>
                            </div>
                            @if ($article->status==1)
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
<script type="text/javascript" src="{{asset('assets/v1/admin/js/ckeditor/ckeditor.js')}}"></script>
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
