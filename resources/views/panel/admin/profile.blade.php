@extends('panel.dashboard')
@section('title')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>ویرایش پروفایل</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">پروفایل</li>
                            <li class="breadcrumb-item active">ویرایش پروفایل</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('body')

    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">پروفایل من</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">

                            @foreach($admins as $admin)
                            <form method="post" action="">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-auto"><img class="img-70 rounded-circle" alt="" src="../assets/images/user/blank-profile-picture-973460_640.png"></div>
                                    <div class="col">
                                        <h3 class="mb-1">{{$admin->name}}</h3>
                                        <p class="mb-4">{{$admin->role}}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">آدرس ایمیل</label>
                                    <input class="form-control" value="{{$admin->email}}" placeholder="your-email@domain.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">رمزعبور</label>
                                    <input class="form-control"  type="password" value="password">
                                </div>


                            </form>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @foreach($admins as $admin)
                    <form class="card" method="post" action="{{route('admin.profile.update',['user'=>$admin->id])}}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title mb-0">ویرایش پروفایل</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        @include('panel.errors')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">نام کاربری</label>
                                        <input class="form-control" name="name" value="{{$admin->name}}" type="text" placeholder="نام کاربری">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">آدرس ایمیل</label>
                                        <input class="form-control" name="email" value="{{$admin->email}}" type="email" placeholder="ایمیل">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رمز عبور</label>
                                        <input class="form-control" name="password"  type="password" placeholder="رمز عبور">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">بروزرسانی پروفایل</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


