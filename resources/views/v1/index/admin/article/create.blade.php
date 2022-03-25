@extends('v1.template.admin.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/v1/admin/css/dropzone.css')}}"/>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        @include('errors')
        <form id="form_validation" method="POST" action="/admin/articles">
            @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="body">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{old('title')}}" name="title" required>
                                                <label class="form-label">عنوان</label>
                                            </div>
                                        </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">تصویر مقاله</label>
            <div class="col-lg-8 fv-row">
                <input type="hidden" name="article_image" id="article-image">
                <div id="photo" class="dropzone"></div>
            </div>
        </div>
        <div class="row mb-6">
            <!--begin::Tags-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">متن مقاله</label>
            <!--end::Tags-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <textarea type="text" name="body" value="{{old('body')}}" class="form-control form-control-lg form-control-solid" ></textarea>
            </div>
            <!--end::Col-->
        </div>
        <button class="btn btn-primary waves-effect" type="submit">تایید</button>
    </form>
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
