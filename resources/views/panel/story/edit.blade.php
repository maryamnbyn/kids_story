@extends('panel.dashboard')
@section('title')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>افزودن داستان جدید</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">داستان</li>
                            <li class="breadcrumb-item active">افزودن داستان جدید</li>
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>افزودن داستان جدید</h5>
                    </div>
                    <div class="card-body form-builder">
                        <div class="form-builder-column">
                            @if(count($errors))
                                <div class="alert alert-danger">
                                    <ui>
                                        @foreach($errors->all() as $error)
                                            <li> {{$error}}</li>
                                        @endforeach
                                    </ui>
                                </div>
                            @endif
                            <form method="post" action="{{route('admin.stories.update',['story'=>$story->id])}}" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                @method('PUT')
                                <div class="row">
                                    <div class="col-6"><!--left side -->
                                        <div class="form-group draggable">
                                            <label for="input-text-1">نام داستان</label>
                                            <input class="form-control btn-square" id="input-text-1"
                                                   name="name"
                                                   type="text" placeholder="متن" value="{{$story->name}}">
                                        </div>
                                        <br>
                                        <div class="form-group draggable">
                                            <label for="input-text-1">موضوع داستان</label>
                                            <input class="form-control btn-square" id="input-text-1"
                                                   type="text" placeholder="متن" name="title" value="{{$story->title}}">
                                        </div>
                                        <br>
                                        <div class="form-group draggable">
                                            <label for="input-text-1">نام نویسنده داستان</label>
                                            <input class="form-control btn-square" id="input-text-1"
                                                   type="text" placeholder="متن" name="writer" value="{{$story->writer}}">
                                        </div>
                                        <br>
                                        <div class="form-group draggable">
                                            <label for="input-text-1">نام ناشر داستان</label>
                                            <input class="form-control btn-square" id="input-text-1"
                                                   type="text" placeholder="متن" name="publisher" value="{{$story->publisher}}">
                                        </div>
                                        <br>
                                        <div class="form-group draggable">
                                            <label for="input-text-1">نام طراح داستان</label>
                                            <input class="form-control btn-square" id="input-text-1"
                                                   type="text" placeholder="متن" name="designer" value="{{$story->designer}}">
                                        </div>
                                        <br>
                                        <div class="form-group draggable">
                                            <label for="input-text-1">نام گوینده داستان</label>
                                            <input class="form-control btn-square" id="input-text-1"
                                                   type="text" placeholder="متن" name="talker" value="{{$story->talker}}">

                                        </div>
                                        <br>
                                        <div class="form-group draggable">
                                            <label for="input-text-1">چکیده داستان</label>
                                            <textarea class="form-control btn-square"
                                                      id="input-text-1" type="text"
                                                      placeholder="متن" name="abstract" > {{$story->abstract}}</textarea>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-6 lg-mt">
                                        <!-- Form builder column wise start-->
                                        <div class="form-body row form-builder-2">
                                            <div class="col-md-12 droppable sortable ui-droppable ui-sortable">
                                                <div class="form-group draggable ui-draggable ui-draggable-handle dropped"
                                                     style="">
                                                    <label for="formcontrol-select1">انتخاب رنج سنی</label>
                                                    <select class="form-control btn-square"
                                                            id="formcontrol-select1" name="age" value="{{$story->age}}">
                                                        <option>1-3</option>
                                                        <option>3-5</option>
                                                        <option>5-7</option>
                                                        <option>7-9</option>

                                                    </select>
                                                    <br>
                                                    <label for="formcontrol-select1">انتخاب دسته بندی</label>
                                                    <select class="form-control btn-square"
                                                            id="formcontrol-select1" name="category"  >
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    <br>
                                                    <div class="col-md-12 droppable sortable ui-droppable ui-sortable">

                                                        <div class="col-md-12 droppable sortable ui-droppable ui-sortable">
                                                            <div class="form-group draggable ui-draggable ui-draggable-handle dropped"
                                                                 style="">
                                                                <div class="form-group draggable">
                                                                    <label for="input-file-1">دریافت صدای
                                                                        داستان</label>
                                                                    <input id="input-file-1" type="file"
                                                                           data-original-title="" title="">

                                                                </div>

                                                                <br>
                                                                <div class="col-md-12 droppable sortable ui-droppable ui-sortable">
                                                                    <div class="form-group draggable ui-draggable ui-draggable-handle dropped"
                                                                         style="">
                                                                        <div class="form-group draggable">
                                                                            <label for="input-file-1">دریافت
                                                                                تصویر داستان</label>
                                                                            <input id="input-file-1"
                                                                                   type="file"
                                                                                   data-original-title=""
                                                                                   title="" name="storyPic">

                                                                        </div>
                                                                        <br>
                                                                        <button class="btn btn-primary active"
                                                                                type="submit"
                                                                                data-original-title="btn btn-dark active"
                                                                                title="" name="storyVoice">ثبت
                                                                        </button>

                                                                    </div>
                                                                    <div class="col-md-6 droppable sortable ui-droppable ui-sortable"
                                                                         style="display: none;"></div>
                                                                    <div class="col-md-6 droppable sortable ui-droppable ui-sortable"
                                                                         style="display: none;"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Form builder column wise ends-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--right side -->
                                </div>
                                <!-- form for teacher/student-->
                            </form>
                        </div>

                        <!-- Container-fluid Ends-->
                    </div>
                    @include('panel.footer')
                </div>
            </div>
            <!-- latest jquery-->
        @include('panel.footer_scripts')
        <!-- Plugin used-->
        </div>
    </div>
@endsection


