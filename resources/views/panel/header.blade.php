<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none">
            <div class="logo-wrapper"><a href="index.html"><img src="{{asset('assets/images/endless-logo.png')}}" alt=""></a></div>
        </div>

        <div class="nav-right col p-0">
            <ul class="nav-menus">
                <li>
                    <form class="form-inline search-form" action="#" method="get">
                        <div class="form-group">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="جستجو...">
                                    <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">در حال بارگذاری...</span></div><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form>
                </li>

                <li class="onhover-dropdown">
                    <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle" src="{{asset('assets/images/dashboard/user.png')}}" alt="header-user">
                        <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20">
                        <li><a href="/admin/profile"><i data-feather="user"></i>ویرایش پروفایل</a></li>
                        </a></li>
                        <li><a class="sidebar-header"  href="/login"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            ><i data-feather="home"></i><span>خروج از حساب کاربری</span></a>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>

    </div>
</div>
