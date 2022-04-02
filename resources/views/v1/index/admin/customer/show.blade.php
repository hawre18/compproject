@extends('v1.template.admin.master')
@section('content')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">نام مشتری</label>
                        <span>{{$customer->name}}</span>
                        </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان پروژه</label>
                        <span>{{$customer->title}}</span>
                        </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">درباره پروژه</label>
                        <span>{!!$customer->body!!}</span>
                        </br>
                        <label>تصویر پروژه</label>
                        <img src="{{asset('storage/images/customers/'.$customer->image->path)}}"> 
                        </br>
                    </br>
                </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">وضعیت قرارداد:</label>
                        @if ($customer->status==1)
                        <span class="label label-success">درحال همکاری</span>
                    </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6"> تاریخ شروع همکاری</label>
                        <span>{{\Hekmatinasser\Verta\Verta::parse($customer->start_date)}}</span>
                        @else
                        <span class="label label-success">اتمام همکاری</span>
                    </br>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">تاریخ شروع همکاری</label>
                        <span>{{\Hekmatinasser\Verta\Verta::parse($customer->start_date)}}</span>
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">تاریخ پایان همکاری</label>
                        <span>{{\Hekmatinasser\Verta\Verta::parse($customer->end_date)}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
@endsection

