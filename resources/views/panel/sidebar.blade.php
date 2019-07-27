<div class="page-sidebar sidebar-pattern6">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="index.html"><img src="{{asset('assets/images/endless-logo.png')}}" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="#">
                <div class="profile-edit"><a href="edit-profile.html" target="_blank"><i data-feather="edit"></i></a></div>
            </div>
            <h6 class="mt-3 f-14">پارادایم</h6>
            <p>مدیر کل.</p>
        </div>
        <ul class="sidebar-menu">



            <li><a class="sidebar-header" href="/admin/dashboard"><i data-feather="home"></i><span>داشبورد</span></a>

            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>داستان</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu
                {{Route::currentRouteName() == 'admin.stories.index' ? 'menu-open' : ''}}
                {{Route::currentRouteName() == 'admin.stories.create' ? 'menu-open' : ''}}"
                style="
                {{Route::currentRouteName() == 'admin.stories.index' ? 'display:block;' : ''}}
                {{Route::currentRouteName() == 'admin.stories.create' ? 'display:block;' : ''}}
                ">

                    <li><a href="/admin/stories" class="{{Route::currentRouteName() == 'admin.stories.index ' ? 'active' : ''}}"><i class="fa fa-circle"></i><span>لیست داستان ها</span></a></li>
                    <li><a href="/admin/stories/create" class="{{Route::currentRouteName() == 'admin.stories.create ' ? 'active' : ''}}"><i class="fa fa-circle"></i><span>افزودن</span></a></li>

                </ul>
            </li>
            <li><a class="sidebar-header" href="/admin/profile" class="{{Route::currentRouteName() == 'admin.profile' ? 'active' : ''}}"><i data-feather="home"></i><span>مشاهده پروفایل</span></a></li>

            <li><a class="sidebar-header"  href="/login"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                   ><i data-feather="home"></i><span>خروج از حساب کاربری</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

        </ul>
    </div>
</div>
