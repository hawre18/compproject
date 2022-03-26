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
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان اسلاید</label>
                        <span>{{$slide->title}}"</span>
                        </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">لینک اسلاید</label>
                        <span>{!!$slide->link!!}</span>
                        </br>
                        <label>تصویر </label>
                        <img src="{{asset('storage/images/slides/'.$slide->image->path)}}"> 
                        </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">وضعیت نشر:</label>
                        @if ($slide->status==1)
                        <span class="label label-warning">فعال</span>
                        @else
                        <span class="label label-warning">غیرفعال</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
@endsection

