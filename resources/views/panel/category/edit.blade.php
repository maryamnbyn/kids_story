@extends('panel.dashboard')
@section('title')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>افزودن دسته بندی جدید</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">دسته بندی</li>
                            <li class="breadcrumb-item active">افزودن دسته بندی جدید</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('body')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ساخت دسته بندی جدید</h5>
                    </div>
                    <div class="card-body">

                        @include('panel.errors')
                        <form method="post" action="{{route('admin.categories.update',['category'=>$category->id])}}"
                              enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            @method('PUT')

                            <div class="row">
                                <div class="col-6"><!--left side -->
                                    <div class="form-group draggable">
                                        <label for="input-text-1">نام </label>
                                        <input class="form-control btn-square" id="input-text-1"
                                               name="name"
                                               type="text" placeholder="متن" value="{{$category->name}}">
                                    </div>

                                </div>

                                <div class="col-md-12 droppable sortable ui-droppable ui-sortable">
                                    <button class="btn btn-primary active"
                                            type="submit"
                                            data-original-title="btn btn-dark active"
                                            title="">ثبت
                                    </button>
                                    <div class="form-group draggable ui-draggable ui-draggable-handle dropped"
                                         style="">

                                        <br>
                                        <!-- Form builder column wise ends-->
                                    </div>
                                </div>
                            </div>



                        </form>
                        {{----}}

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>لیست همه ی دسته بندی ها</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام دسته بندی</th>
                                    <th scope="col">عملیات</th>
                                    <th scope="col">عملیات</th>

                                </tr>
                                </thead>

                                <tbody >
                                <tr>
                                    @foreach($categories as $category)
                                        <th scope="row"></th>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <form method="post" action="{{ route('admin.categories.destroy' , ['category' =>$category->id ]) }}">
                                                <a class="btn btn-secondary btn-sm"
                                                   href="{{ route('admin.categories.edit',['category' =>$category->id ])  }}">ویرایش</a>

                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" href="#" value="Delete"
                                                        onClick="deleteme({{$category->id}})">حذف
                                                </button>

                                            </form>

                                            <script language="javascript">
                                                function deleteme(id) {
                                                    if (confirm("آیا مطمئن هستید؟!")) {
                                                        window.location.href = 'products.destroy?del=' + id + '';
                                                        return true;
                                                    }
                                                }
                                            </script>
                                        </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

