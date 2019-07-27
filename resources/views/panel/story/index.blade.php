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
                                <h3>لیست داستان ها</h3>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>داستان ها</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نام اصلی</th>
                                        <th scope="col">نام خانوادگی</th>
                                        <th scope="col">نام کاربری</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">نام کاربری</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Country</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Alexander</td>
                                        <td>Orton</td>
                                        <td>@mdorton</td>
                                        <td>Admin</td>
                                        <td>USA</td>
                                        <td>@mdorton</td>
                                        <td>Admin</td>
                                        <td>USA</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
                        <!-- Bookmark Ends-->

        @include('panel.footer')
    </div>
</div>
<!-- latest jquery-->
@include('panel.footer_scripts')
<!-- Plugin used-->
</body>

</html>