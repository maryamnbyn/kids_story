@include('panel.head')

<body main-theme-layout="rtl">
<!-- Loader starts-->

<!-- Loader ends-->
<!-- page-wrapper Start-->

<div class="page-wrapper">
    <!-- Page Header Start-->
@include('panel.header')
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
    @include('panel.sidebar')
        <!-- Page Sidebar Ends-->
        <!-- Right sidebar Start-->
        <div class="right-sidebar" id="right_side_bar">
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">لیست دوستان</h6>
                    </div>
                    <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="جستجوی دوست"><i class="fa fa-search"></i>
            </div>
            <div class="chat-box">
                <div class="people-list friend-list">
                    <ul class="list">
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/1.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> آنلاین</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/2.png" alt="">
                            <div class="status-circle away"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> 28 دقیقه پیش</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/8.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> آنلاین</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/4.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> آنلاین</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/5.jpg" alt="">
                            <div class="status-circle offline"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> 2 دقیقه پیش</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/6.jpg" alt="">
                            <div class="status-circle away"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> 2 ساعت پیش</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/user/7.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">اسم فرضی</div>
                                <div class="status"> آنلاین</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Right sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <div class="page-header-left">
                                <h3>پیش فرض</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item">داشبورد</li>
                                    <li class="breadcrumb-item active">پیش فرض</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Bookmark Start-->

                        <!-- Bookmark Ends-->
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 xl-100">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-widget-dashboard">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 f-w-600"><i data-feather="dollar-sign"></i><span class="counter">5789</span></h5>
                                                    <p>مجموع بازدید ها</p>
                                                </div><i data-feather="tag"></i>
                                            </div>
                                            <div class="dashboard-chart-container">
                                                <div class="small-chart-gradient-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-widget-dashboard">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 f-w-600"><i data-feather="dollar-sign"></i><span class="counter">4986</span></h5>
                                                    <p>کل فروش</p>
                                                </div><i data-feather="shopping-cart"></i>
                                            </div>
                                            <div class="dashboard-chart-container">
                                                <div class="small-chart-gradient-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-widget-dashboard">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 f-w-600"><i data-feather="dollar-sign"></i><span class="counter">8568</span></h5>
                                                    <p>ارزش کل</p>
                                                </div><i data-feather="sun"></i>
                                            </div>
                                            <div class="dashboard-chart-container">
                                                <div class="small-chart-gradient-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('panel.chart')

                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('panel.footer')
    </div>
</div>
<!-- latest jquery-->
@include('panel.footer_scripts')
<!-- Plugin used-->
</body>

</html>