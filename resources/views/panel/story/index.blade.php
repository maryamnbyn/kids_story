@include('panel.head')

<body main-theme-layout="rtl">

<div class="page-wrapper">

    @include('panel.header')

    <div class="page-body-wrapper">

        @include('panel.sidebar')

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
                                        <th scope="col">نام</th>
                                        <th scope="col">موضوع</th>
                                        <th scope="col">نویسنده</th>
                                        <th scope="col">ناشر</th>
                                        <th scope="col">طراح</th>
                                        <th scope="col">گوینده</th>
                                        <th scope="col">چکیده</th>
                                        <th scope="col">رده سنی</th>
                                        <th scope="col">تعداد دانلود</th>
                                        <th scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($stories as $story)
                                            <th scope="row">{{$story->id}}</th>
                                            <td>{{$story->name}}</td>
                                            <td>{{$story->section_body  }}</td>
                                            <td>{{$story->writer}}</td>
                                            <td>{{$story->publisher}}</td>
                                            <td>{{$story->designer}}</td>
                                            <td>{{$story->talker}}</td>
                                            <td>{{$story->section_body }}</td>
                                            <td>{{$story->age}}</td>
                                            <td>{{$story->downloadCount()}}</td>
                                            <td>
                                                <form action="{{ route('admin.stories.destroy',['story' =>$story->id ]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" href="#"
                                                            onClick="deleteme({{$story->id}})">حذف
                                                    </button>
                                                    <a class="dropdown-item"
                                                       href="{{ route('admin.stories.edit',['story' =>$story->id ])  }}">ویرایش</a>
                                                </form>
                                            </td>
                                            <script language="javascript">
                                                function deleteme(id) {
                                                    if (confirm("آیا مطمئن هستید؟!")) {
                                                        window.location.href = 'products.destroy?del=' + id + '';
                                                        return true;
                                                    }
                                                }
                                            </script>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div style="text-align:center;">
                                    {!! $stories->render() !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Container-fluid Ends-->
            </div>

            <!-- Bookmark Ends-->

        </div>
        @include('panel.footer')
    </div>
    <!-- latest jquery-->
@include('panel.footer_scripts')
<!-- Plugin used-->
</body>

</html>