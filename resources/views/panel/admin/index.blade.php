@extends('panel.dashboard')
@section('title')
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
@endsection
@section('body')
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
@endsection
