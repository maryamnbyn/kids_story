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
            <div class="col-xl-12 xl-100">
                {{--<div class="row">--}}

                    {{--<div class="col-xl-4 xl-100">--}}
                        {{--<div class="card bg-primary">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="media faq-widgets">--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5>مقالات</h5>--}}
                                        {{--<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از--}}
                                            {{--طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که--}}
                                            {{--لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود--}}
                                            {{--ابزارهای کاربردی می باشد..</p>--}}
                                    {{--</div>--}}
                                    {{--<i data-feather="file-text"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-4 xl-100">--}}
                        {{--<div class="card bg-primary">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="media faq-widgets">--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5>مقالات</h5>--}}
                                        {{--<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از--}}
                                            {{--طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که--}}
                                            {{--لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود--}}
                                            {{--ابزارهای کاربردی می باشد..</p>--}}
                                    {{--</div>--}}
                                    {{--<i data-feather="file-text"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-4 xl-100">--}}
                        {{--<div class="card bg-primary">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="media faq-widgets">--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5>مقالات</h5>--}}
                                        {{--<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از--}}
                                            {{--طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که--}}
                                            {{--لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود--}}
                                            {{--ابزارهای کاربردی می باشد..</p>--}}
                                    {{--</div>--}}
                                    {{--<i data-feather="file-text"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">نمودار نمایش کاربران</div>
                            <div class="card-body">
                                @include('panel.chart')
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
