<div class="page-sidebar sidebar-pattern6">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="#"><img src="{{asset('assets/images/endless-logo.png')}}" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle" src="{{asset('assets/images/user/blank-profile-picture-973460_640.png')}}" alt="#">
                <div class="profile-edit"><a href="/admin/profile" target="_blank"><i data-feather="edit"></i></a></div>
            </div>
            <h6 class="mt-3 f-14">قصه های کودک</h6>
        </div>
        <ul class="sidebar-menu">

            <li><a class="sidebar-header" href="/admin/dashboard"><i data-feather="home"></i><span>داشبورد</span></a>
            </li>

            <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>داستان</span><i
                            class="fa fa-angle-right pull-left"></i></a>
                <ul class="sidebar-submenu">

                    <li><a href="/admin/stories" class=""><i class="fa fa-circle"></i><span>لیست داستان ها</span></a>
                    </li>
                    <li><a href="/admin/stories/create" class=""><i class="fa fa-circle"></i><span>افزودن</span></a>
                    </li>

                </ul>
            </li>

            <li><a class="sidebar-header" href="/admin/categories/create"><i
                            data-feather="home"></i><span>دسته بندی</span></a></li>

            <li><a class="sidebar-header" href="/admin/profile" class="
"><i data-feather="home"></i><span> پروفایل</span></a></li>

            <li><a class="sidebar-header" href="/login" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                ><i data-feather="home"></i><span>خروج از حساب کاربری</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

        </ul>
    </div>
</div>
