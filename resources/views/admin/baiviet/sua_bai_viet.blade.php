@extends('admin.layout_admin.layout_admin')

@section('main')

    <div class="col-lg-12">
        <!-- Card -->
        <div class="card card-lg mb-3 mb-lg-5">
            <form action="{{route('updateBV')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Sửa bài viết</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Form Group -->
                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label class="input-label">Ảnh đại diện</label>

                            <div class="d-flex align-items-center position-relative">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="output" class="avatar-img shadow-soft"
                                         src="{{$item->blog_image}}" alt="Image">

                                    <input type="file" class="js-file-attach avatar-uploader-input form-control"
                                           id="avatarUploader"
                                           name="image_upload"
                                           accept="image/*"
                                           onchange="loadFile(this)">

                                    <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                </label>
                                <!-- End Avatar -->


                                <button type="button" onclick="deleteImg(this)"
                                        class="js-file-attach-reset-img btn btn-white">Delete
                                </button>
                            </div>
                        </div>
                        <!-- End Form Group -->

                    </div>
                    <!-- Form Group -->
                    <div class="form-group">
                        <input type="number" class="form-control" name="id"
                               value="{{$item->id}}"
                               id="projectNameProjectSettingsLabel" placeholder="ID"
                               aria-label="Enter project name here" hidden="">
                    </div>
                    <!-- End Form Group -->
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-one-eg1" role="tabpanel"
                             aria-labelledby="nav-one-eg1-tab">
                            <div class="row">
                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Tiêu đề bài
                                            viết
                                        </label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-briefcase-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="tieu_de"
                                                   id="projectNameProjectSettingsLabel" placeholder="Tiêu đề"
                                                   value="{{$item->blog_title}}"
                                                   aria-label="Enter project name here"
                                                   onchange="onChangeInput_edit(this,'tieu_de')"
{{--                                                   pattern=".{1,60}"--}}
                                                   title="Tiêu đề có độ dài không quá 60 ký tự"  required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Slug <i
                                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                                data-placement="top"
                                                title=""
                                                data-original-title="Displayed on public forums, such as Front."></i></label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-briefcase-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="post_name"
                                                   id="slug" placeholder="VD: file-cad"
                                                   value="{{$item->blog_slug}}"
                                                   aria-label="Enter project name here"
                                                   title="Không được để trống" required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Tác giả<i
                                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                                data-placement="top"
                                                title=""
                                                data-original-title="Displayed on public forums, such as Front."></i></label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-briefcase-outlined"></i>
                                                </div>
                                            </div>
                                            <select name="tac_gia" id="projectNameProjectSettingsLabel"
                                                    class="form-control">
                                                <optgroup label="Tác giả">
                                                    <option value="" disabled hidden>Chọn tác giả</option>
                                                    @foreach($users as $user)
                                                        @if($item->blog_author == $user->id)
                                                            <option value="{{$user->id}}"
                                                                    selected>{{$user->display_name}}</option>
                                                        @else
                                                            <option value="{{$user->id}}">{{$user->display_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            {{--                                <input type="number" class="form-control" name="tac_gia"--}}
                                            {{--                                       id="projectNameProjectSettingsLabel" placeholder="Tác giả"--}}
                                            {{--                                       aria-label="Enter project name here" >--}}
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Mô tả
                                        </label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-briefcase-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="mo_ta"
                                                   value="{{$item->blog_content}}"
                                                   id="projectNameProjectSettingsLabel" placeholder="Tóm tắt nội dung"
{{--                                                   aria-label="Enter project name here" pattern=".{1,140}"--}}
                                                   required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                    {{--                        <button type="button" class="btn btn-white mr-2">Cancel</button>--}}
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            <!-- End Footer -->
        </div>
        <!-- End Card -->


    </div>

    {{--        <section class="content">--}}
    {{--            <div class="col-6">--}}
    {{--                <form action="{{route('themBV')}}" method="post">--}}
    {{--                    @csrf--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">Tiêu đề</label>--}}
    {{--                        <input type="text" name="tieu_de" class="form-control" placeholder="Tiêu đề">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">Nội dung</label>--}}
    {{--                        <input type="text" id="noi_dung" name="noi_dung" placeholder="Nhập nội dung bài viết"> </input>--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">Tác giả </label>--}}
    {{--                        <input type="number" name="name" class="form-control" placeholder="Tác giả">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">Date </label>--}}
    {{--                        <input type="datetime-local" name="date" class="form-control" placeholder="Date">--}}
    {{--                    </div>--}}

    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">modified </label>--}}
    {{--                        <input type="datetime-local" name="modified" class="form-control" placeholder="Date">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">name</label>--}}
    {{--                        <input type="text" name="name" class="form-control" placeholder="name">--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-12 text-center ">--}}
    {{--                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Enter</button>--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}

    {{--        </section>--}}

    <style>
        .multiselect-dropdown {
            width: 100% !important;
        }
    </style>

@endsection
