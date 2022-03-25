@extends('v1.template.admin.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box text-center white">
                        <div class="text font-17 m-b-5">مجموع درآمد</div>
                        <h3 class="m-b-10">758 تومان
                            <i class="material-icons col-green">trending_up</i>
                        </h3>
                        <div class="icon">
                            <div class="chart chart-bar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box text-center white">
                        <div class="text font-17 m-b-5">سفارشات دریافت شده</div>
                        <h3 class="m-b-10">1025
                            <i class="material-icons col-red">trending_down</i>
                        </h3>
                        <div class="icon">
                            <span class="chart chart-line"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box text-center white">
                        <div class="text font-17 m-b-5">مجموع فروش</div>
                        <h3 class="m-b-10">956
                            <i class="material-icons col-green">trending_up</i>
                        </h3>
                        <div class="icon">
                            <div class="chart chart-pie"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box text-center white">
                        <div class="text font-17 m-b-5">مجموع کاربران فعال</div>
                        <h3 class="m-b-10">214
                            <i class="material-icons col-red">trending_down</i>
                        </h3>
                        <div class="icon">
                            <div class="chart" id="liveChart">بارگذاری..</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>گزارشات</strong> اخیر</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">اقدام</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">اقدام دیگر</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">چیز دیگری اینجا</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="card">
                                <div class="chart-box-left">
                                    <div class="chart-note">
                                        <span class="dot dot-product"></span>
                                        <span>محصولات</span>
                                    </div>
                                    <div class="chart-note mr-0">
                                        <span class="dot dot-service"></span>
                                        <span>خدمات</span>
                                    </div>
                                </div>
                                <!-- Canvas for Chart.js -->
                                <canvas id="chartReport1"></canvas>
                                <!-- Custom Axis -->
                                <div class="axisData">
                                    <div class="tick">
                                        دو <span class="value productValue">24</span> <span class="value serviceValue">20</span>
                                    </div>
                                    <div class="tick">
                                        سه <span class="value productValue">18</span> <span class="value serviceValue">22</span>
                                    </div>
                                    <div class="tick">
                                        چهار <span class="value productValue">16</span> <span class="value serviceValue">30</span>
                                    </div>
                                    <div class="tick">
                                        پنج <span class="value productValue">18</span> <span class="value serviceValue">22</span>
                                    </div>
                                    <div class="tick">
                                        جمعه <span class="value productValue">24</span> <span class="value serviceValue">18</span>
                                    </div>
                                    <div class="tick">
                                        شنبه <span class="value productValue">36</span> <span class="value serviceValue">22</span>
                                    </div>
                                    <div class="tick">
                                        یک <span class="value productValue">28</span> <span class="value serviceValue">30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>گزارشات</strong> اخیر</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">اقدام</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">اقدام دیگر</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">چیز دیگری اینجا</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="card">
                                <div class="chart-box-left">
                                    <div class="chart-note">
                                        <span class="dot dot-product"></span>
                                        <span>محصولات</span>
                                    </div>
                                    <div class="chart-note mr-0">
                                        <span class="dot dot-service"></span>
                                        <span>خدمات</span>
                                    </div>
                                </div>
                                <!-- Canvas for Chart.js -->
                                <canvas id="chartReport2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>جزئیات</strong> مشتریان</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">اقدام</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">اقدام دیگر</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">چیز دیگری اینجا</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>ایمیل</th>
                                            <th>وضعیت</th>
                                            <th>نام پروژه</th>
                                            <th>اقدام</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-img">
                                                <img src="assets/images/user/user1.jpg" alt="">
                                            </td>
                                            <td>آرش خادملو</td>
                                            <td>xyz@email.com</td>
                                            <td>
                                                <span class="label bg-green shadow-style">فعال</span>
                                            </td>
                                            <td>ERP System</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-img">
                                                <img src="assets/images/user/user2.jpg" alt="">
                                            </td>
                                            <td>آرش خادملو</td>
                                            <td>xyz@email.com</td>
                                            <td>
                                                <span class="label bg-red shadow-style">غیر فعال</span>
                                            </td>
                                            <td>الفبای وب سایت</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-img">
                                                <img src="assets/images/user/user3.jpg" alt="">
                                            </td>
                                            <td>آرش خادملو</td>
                                            <td>xyz@email.com</td>
                                            <td>
                                                <span class="label bg-green shadow-style">فعال</span>
                                            </td>
                                            <td>الفبای وب سایت</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-img">
                                                <img src="assets/images/user/user4.jpg" alt="">
                                            </td>
                                            <td>Angelica Ramos</td>
                                            <td>xyz@email.com</td>
                                            <td>
                                                <span class="label bg-green shadow-style">فعال</span>
                                            </td>
                                            <td>الفبای وب سایت</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-img">
                                                <img src="assets/images/user/user5.jpg" alt="">
                                            </td>
                                            <td>آرش خادملو</td>
                                            <td>xyz@email.com</td>
                                            <td>
                                                <span class="label bg-red shadow-style">غیر فعال</span>
                                            </td>
                                            <td>الفبای وب سایت</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-img">
                                                <img src="assets/images/user/user6.jpg" alt="">
                                            </td>
                                            <td>آرش خادملو</td>
                                            <td>xyz@email.com</td>
                                            <td>
                                                <span class="label bg-green shadow-style">فعال</span>
                                            </td>
                                            <td>الفبای وب سایت</td>
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>پروژه های </strong>جدید</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">اقدام</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">اقدام دیگر</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">چیز دیگری اینجا</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="new-orders" class="media-list position-relative">
                                <div class="table-responsive">
                                    <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">محصول</th>
                                                <th class="border-top-0">کارمندان</th>
                                                <th class="border-top-0">هزینه</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-truncate">آیفون ایکس</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">8999 تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">پیکسل 2</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">8999 تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">OnePlus</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">8999 تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">گلکسی</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$7500</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">موتو زد2</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">8999 تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">آیفون ایکس</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">8999 تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">آیفون ایکس</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list">
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user1.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user2.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <img class="rounded-circle" src="assets/images/user/user3.jpg"
                                                                alt="user">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge">+4</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">8999 تومان</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center">
                        <i class="fab fa-twitter fa-3x col-blue"></i>
                        <div class="title p-t-15">
                            <h3>توییتر</h3>
                        </div>
                        <div class="text p-b-10">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                        </div>
                        <a href="#">ادامه مطلب</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center">
                        <i class="fab fa-instagram fa-3x col-red"></i>
                        <div class="title p-t-15">
                            <h3>اینستاگرام</h3>
                        </div>
                        <div class="text p-b-10">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                        </div>
                        <a href="#">ادامه مطلب</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center">
                        <i class="fab fa-facebook-f fa-3x col-blue"></i>
                        <div class="title p-t-15">
                            <h3>فیسبوک</h3>
                        </div>
                        <div class="text p-b-10">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                        </div>
                        <a href="#">ادامه مطلب</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>منبع</strong> درآمد</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">اقدام</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">اقدام دیگر</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">چیز دیگری اینجا</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="totalEarning">
                                <h2>90,808 تومان</h2>
                            </div>
                            <div class="p-t-10">
                                <span class="pull-right progress-label">envato.com</span>
                                <span class="pull-left progress-percent label label-info m-b-5">17%</span>
                            </div>
                            <div class="earningProgress">
                                <div class="progress shadow-style">
                                    <div class="progress-bar l-bg-green width-per-17" role="progressbar" aria-valuenow="17"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="p-t-10">
                                <span class="pull-right progress-label">google.com</span>
                                <span class="pull-left progress-percent label label-danger m-b-5">27%</span>
                            </div>
                            <div class="earningProgress">
                                <div class="progress shadow-style">
                                    <div class="progress-bar l-bg-purple width-per-27" role="progressbar" aria-valuenow="27"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="p-t-10">
                                <span class="pull-right progress-label">yahoo.com</span>
                                <span class="pull-left progress-percent label label-primary m-b-5">25%</span>
                            </div>
                            <div class="earningProgress">
                                <div class="progress shadow-style">
                                    <div class="progress-bar l-bg-orange width-per-25" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="p-t-10">
                                <span class="pull-right progress-label">فروشگاه</span>
                                <span class="pull-left progress-percent label label-success m-b-5">18%</span>
                            </div>
                            <div class="earningProgress">
                                <div class="progress shadow-style">
                                    <div class="progress-bar l-bg-cyan width-per-18" role="progressbar" aria-valuenow="18"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="p-t-10">
                                <span class="pull-right progress-label">سایر</span>
                                <span class="pull-left progress-percent label label-warning m-b-5">13%</span>
                            </div>
                            <div class="earningProgress">
                                <div class="progress shadow-style">
                                    <div class="progress-bar l-bg-red width-per-13" role="progressbar" aria-valuenow="13"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Customer Review -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>بررسی</strong> مشتری</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">اقدام</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">اقدام دیگر</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">چیز دیگری اینجا</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="review-block">
                                <div class="row">
                                    <div class="review-img">
                                        <img src="assets/images/user/user1.jpg" alt="">
                                    </div>
                                    <div class="col">
                                        <h6 class="m-b-15">آرش خادملو
                                            <span class="float-right m-r-10 text-muted"> 1 هفته پیش
                                            </span>
                                        </h6>
                                        <i class="material-icons col-green">star</i>
                                        <i class="material-icons col-green">star</i>
                                        <i class="material-icons col-green">star</i>
                                        <i class="material-icons col-green">star_half</i>
                                        <i class="material-icons col-green">star_border</i>
                                        <p class="m-t-15 m-b-15">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز.
                                        </p>
                                        <a href="#!">
                                            <i class="material-icons m-r-10">thumb_up</i>
                                        </a>
                                        <a href="#!">
                                            <i class="material-icons m-r-10 col-red">thumb_down</i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="review-img">
                                        <img src="assets/images/user/user2.jpg" alt="">
                                    </div>
                                    <div class="col">
                                        <h6 class="m-b-15">آرش خادملو
                                            <span class="float-right m-r-10 text-muted"> 1 هفته پیش
                                            </span>
                                        </h6>
                                        <i class="material-icons col-red">star</i>
                                        <i class="material-icons col-red">star_half</i>
                                        <i class="material-icons col-red">star_border</i>
                                        <i class="material-icons col-red">star_border</i>
                                        <i class="material-icons col-red">star_border</i>
                                        <p class="m-t-15 m-b-15">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز. </p>
                                        <a href="#!">
                                            <i class="material-icons m-r-10">thumb_up</i>
                                        </a>
                                        <a href="#!">
                                            <i class="material-icons m-r-10 col-red">thumb_down</i>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center  m-b-5">
                                    <a href="#!" class="b-b-primary text-primary">مشاهده تمام نظرات مشتریان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Customer Review -->
            </div>
        </div>
    </section>
@endsection
   