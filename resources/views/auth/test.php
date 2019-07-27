@include('panel.head')
<body main-theme-layout="rtl">
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="loader bg-white">
        <div class="whirly-loader"> </div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">

    <div class="container-fluid p-0">
        <!-- login page start-->
        <div class="authentication-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="auth-innerright">
                        <div class="authentication-box">
                            <div class="text-center"><img src="../assets/images/endless-logo.png" alt=""></div>
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4>ورود</h4>
                                        <h6>نام کاربری و رمز عبور خود را وارد کنید </h6>
                                    </div>
                                    <form class="theme-form" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">نام شما</label>
                                            <input class="form-control" id="email" type="email" required="">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">رمز عبور</label>
                                            <input class="form-control" id="password" type="password" required="">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group form-row mt-3 mb-0">
                                            <button class="btn btn-primary btn-block" type="submit">ورود</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login page end-->
    </div>
</div>
<!-- latest jquery-->
@include('panel.footer_scripts')
<!-- Plugin used-->
</body>

</html>