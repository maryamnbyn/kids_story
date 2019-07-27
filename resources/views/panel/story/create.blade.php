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

        <!-- Right sidebar Ends-->

        <!-- footer start-->

<!-- Bookmark Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <div class="page-header-left">
                                <h3>فرم ساز 2</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item">فرم ساز</li>
                                    <li class="breadcrumb-item active">فرم ساز 2</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Bookmark Start-->
                        <div class="col">
                            <div class="bookmark pull-right">
                                <ul>
                                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="تقویم"><i data-feather="calendar"></i></a></li>
                                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="ایمیل"><i data-feather="mail"></i></a></li>
                                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="چت"><i data-feather="message-square"></i></a></li>
                                    <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                                        <form class="form-inline search-form">
                                            <div class="form-group form-control-search">
                                                <input type="text" placeholder="جستجو..">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Bookmark Ends-->
                    </div>
                </div>
            </div>
        <div class="form-builder">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>فرم ساز</h5>
                            </div>
                            <div class="card-body form-builder">
                                <div class="form-builder-column">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-builder-2-header">
                                                <div>
                                                    <ul class="nav nav-primary" id="pills-tab" role="tablist">
                                                        <li class="nav-item"><a class="nav-link active" id="pills-input-tab" data-toggle="pill" href="#pills-input" role="tab" aria-controls="pills-input" aria-selected="true">ورودی</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-radcheck-tab" data-toggle="pill" href="#pills-radcheck" role="tab" aria-controls="pills-radcheck" aria-selected="false">رادیو / چک باکس</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-select-tab" data-toggle="pill" href="#pills-select" role="tab" aria-controls="pills-select" aria-selected="false">انتخاب</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-button-tab" data-toggle="pill" href="#pills-button" role="tab" aria-controls="pills-button" aria-selected="false">دکمه ها</a></li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <nav class="navbar navbar-expand-md p-0">
                                                        <form class="form-inline">
                                                            <div class="form-group">
                                                                <select class="btn form-control b-light digits" id="n-columns">
                                                                    <option value="1">1 ستونه</option>
                                                                    <option value="2">2 ستونه</option>
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-primary copy-btn" id="copy-to-clipboard" type="submit" data-clipboard-text="testing">Copy HTML</button>
                                                        </form>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-input" role="tabpanel" aria-labelledby="pills-input-tab">
                                                    <form class="theme-form">
                                                        <div class="form-group draggable">
                                                            <label for="input-text-1">ورودی متن</label>
                                                            <input class="form-control btn-square" id="input-text-1" type="email" placeholder="وارد کردن ایمیل">
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label for="input-password-1">رمزعبور</label>
                                                            <input class="form-control btn-square" id="input-password-1" type="password" placeholder="رمزعبور">
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label for="select-1">انتخاب</label>
                                                            <select class="form-control btn-square" id="select-1">
                                                                <option value="Option 1">گزینه 1</option>
                                                                <option value="Option 2">گزینه 2</option>
                                                                <option value="Option 3">گزینه 3</option>
                                                            </select>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label for="input-file-1">ورودی فایل</label>
                                                            <input id="input-file-1" type="file">
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label for="prependedcheckbox">جعبه افزودنی</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">
                                          <input type="checkbox"></span></div>
                                                                <input class="form-control btn-square" id="prependedcheckbox" name="prependedcheckbox" type="text" placeholder="محل نگهدارنده">
                                                            </div>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label for="prependedcheckbox">دکمه کشویی</label>
                                                            <div class="input-group">
                                                                <input class="form-control btn-square" id="buttondropdown" name="buttondropdown" placeholder="محل نگهدارنده" type="text">
                                                                <div class="input-group-btn btn btn-square p-0">
                                                                    <button class="btn btn-primary dropdown-toggle btn-square" type="button" data-toggle="dropdown">اقدام<span class="caret"></span></button>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a class="dropdown-item" href="#">گزینه یک</a></li>
                                                                        <li><a class="dropdown-item" href="#">گزینه دو</a></li>
                                                                        <li><a class="dropdown-item" href="#">گزینه سه</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-radcheck" role="tabpanel" aria-labelledby="pills-radcheck-tab">
                                                    <form class="theme-form">
                                                        <div class="form-group draggable">
                                                            <label>چک باکس درون خطی</label>
                                                            <div class="col">
                                                                <div class="m-checkbox-inline">
                                                                    <div class="checkbox">
                                                                        <input id="checkbox1" type="checkbox">
                                                                        <label for="checkbox1">پیش فرض 1</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input id="checkbox2" type="checkbox">
                                                                        <label for="checkbox2">پیش فرض 2</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input id="checkbox3" type="checkbox">
                                                                        <label for="checkbox3">پیش فرض 3</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="help-block m-t-help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label>رادیوباکس درون خطی</label>
                                                            <div class="col">
                                                                <div class="m-checkbox-inline">
                                                                    <div class="radio radio-theme">
                                                                        <input id="radioinline1" type="radio" name="radio1" value="option1">
                                                                        <label for="radioinline1">گزینه 1</label>
                                                                    </div>
                                                                    <div class="radio radio-theme">
                                                                        <input id="radioinline2" type="radio" name="radio1" value="option2">
                                                                        <label for="radioinline2">گزینه 2</label>
                                                                    </div>
                                                                    <div class="radio radio-theme">
                                                                        <input id="radioinline3" type="radio" name="radio1" value="option3">
                                                                        <label for="radioinline3">گزینه 3</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="help-block m-t-help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label>جعبه سفارشی</label>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <div class="checkbox">
                                                                        <input id="checkbox-def" type="checkbox">
                                                                        <label for="checkbox-def">پیش فرض</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input id="checkbox-dis" type="checkbox" disabled="">
                                                                        <label for="checkbox-dis">غیرفعال</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input id="checkbox-chk" type="checkbox" checked="">
                                                                        <label for="checkbox-chk">چک شده</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-select" role="tabpanel" aria-labelledby="pills-select-tab">
                                                    <form class="theme-form">
                                                        <div class="form-group draggable">
                                                            <label for="formcontrol-select1">نمونه را انتخاب کنید</label>
                                                            <select class="form-control btn-square" id="formcontrol-select1">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label for="formcontrol-select2">چند مثال را انتخاب کنید</label>
                                                            <select class="form-control btn-square" id="formcontrol-select2" multiple="">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-button" role="tabpanel" aria-labelledby="pills-button-tab">
                                                    <form class="theme-form">
                                                        <div class="form-group draggable">
                                                            <label class="m-r-10">دکمه تک</label><br>
                                                            <button class="btn btn-primary active" type="button" data-original-title="btn btn-dark active" title="">دکمه</button>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group draggable">
                                                            <label class="m-r-10">دوبار دکمه</label><br>
                                                            <button class="btn btn-primary" type="button" data-original-title="btn btn-primary-gradien" title="">اصلی</button>
                                                            <button class="btn btn-secondary" type="button" data-original-title="btn btn-primary-gradien" title="">ثانویه</button>
                                                            <p class="help-block">متن راهنما بلوک سطح اینجا.</p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6 lg-mt">
                                            <!-- Form builder column wise start-->
                                            <div class="drag-bx card-body">
                                                <div class="text-muted empty-form text-center">
                                                    <h6>کشیدن و رها کردن عناصر برای ساخت فرم.</h6>
                                                </div>
                                                <div class="form-body row form-builder-2">
                                                    <div class="col-md-12 droppable sortable"></div>
                                                    <div class="col-md-6 droppable sortable" style="display: none;"></div>
                                                    <div class="col-md-6 droppable sortable" style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form builder column wise ends-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
        @include('panel.footer')
    </div>
</div>
<!-- latest jquery-->
@include('panel.footer_scripts')
<!-- Plugin used-->
</body>

</html>