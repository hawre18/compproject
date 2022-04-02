@extends('v1.template.admin.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/v1/admin/css/dropzone.css')}}"/>
    <style>
        #end_date{
            display:none; 
        }
    </style>
@endsection
<section class="content">
@section('content')
    <div class="container-fluid">
        @include('errors')
        <form method="POST" action="/admin/customers">
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
                                            <input type="text" class="form-control" value="{{old('name')}}" name="name" required>
                                            <label class="form-label">نام مشتری</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{old('title')}}" name="title" required>
                                            <label class="form-label">عنوان پروژه</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line input-group">    
                                            <input type="text"  class="form-control" value="{{old('start_date')}}" name="start_date" required>
                                            <label class="form-label">تاریخ شروع همکاری (شمسی)</label>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label>
                                                <input class="with-gap" value="1" name="status" type="radio" checked id="hok"  onclick="hok1()"/>
                                                <span>درحال همکاری</span>
                                            </label>
                                            <label>
                                                <input class="with-gap" value="0" name="status" type="radio" id="hok2"  onclick="hok1()"/>
                                                <span> اتمام همکاری</span>
                                            </label>
                                        </div>
                                        <div class="form-group form-float" id="end_date">
                                            <div class="form-line input-group">    
                                            <input type="text"  class="form-control" value="{{old('end_date')}}" name="end_date">
                                            <label class="form-label">تاریخ پایان همکاری (شمسی)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">تصویر پروژه</label>
            <div class="col-lg-8 fv-row">
                <input type="hidden" name="customer_image" id="customer-image">
                <div id="photo" class="dropzone"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">درباره همکاری</label>
            <div class="col-lg-8 fv-row">
                <textarea type="text" name="body" value="{{old('body')}}" class="form-control form-control-lg form-control-solid" ></textarea>
            </div>
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
            url: "{{ route('customers.image') }}",
            sending: function(file, xhr, formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success: function(file, response){
                document.getElementById('customer-image').value = response.customer_image
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
