@extends('v1.template.users.master')
@section('content')
<!-- Start BreadCrumb Area -->
<div class="breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100">
                    <h2 class="title">وبلاگ لیستی</h2>
                    <ul class="page-list">
                        <li class="rn-breadcrumb-item"><a href="index-2.html">خانه </a></li>
                        <li class="rn-breadcrumb-item active">وبلاگ لیستی</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End BreadCrumb Area -->

<!-- Blog -->
<div class="rn-blog-area ptb--120 bg_color--1">
    <div class="container">
        <div class="row mt_dec--30">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="im_box">
                    <div class="thumbnail"><a href="blog-details.html"><img class="w-100" src="{{asset('assets/v1/users/images/blog/blog-01.jpg')}}" alt="Blog Images"></a></div>
                    <div class="content">
                        <div class="inner">
                            <div class="content_heading">
                                <div class="category_list"><a href="#">توسعه وب</a></div>
                                <h4 class="title"><a href="blog-details.html">تفاوت وب و برند چیست؟.</a></h4>
                            </div>
                            <div class="content_footer"><a class="rn-btn btn-opacity" href="blog-details.html">ادامه مطلب</a></div>
                        </div><a class="transparent_link" href="blog-details.html"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt--60">
            <div class="col-lg-12">
                <div class="rn-pagination text-center">
                    <ul class="page-list">
                        <li class="active"><a href="blog.html">1</a></li>
                        <li><a href="blog.html">
                                <i data-feather="chevron-left"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection