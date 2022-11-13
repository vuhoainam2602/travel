@extends('admin.layout_admin.layout_admin')
@section("main")
    <div class="row justify-content-lg-center">
        <div class="col-lg-8">


            <!-- Content Step Form -->
            <div id="addUserStepFormContent">
                <h2 class="text-center">Thêm Nhân Viên</h2>
                <!-- Card -->
                <form action="{{Request::root().'/admin/insert-user'}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="addUserStepProfile" class="card card-lg active" style="">
                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label" for="avatarUploader">Ảnh đại diện</label>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                        <img id="output" class="avatar-img shadow-soft" style="padding: 20px"
                                             src="https://rdone.net/images/icons8-upload-96.png" alt="Image Description">

                                        <span class="avatar-uploader-trigger">
                                    <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                    </span>
                                    </label>
                                    <input type="file" class="js-file-attach avatar-uploader-input form-control"
                                           id="avatarUploader"
                                           name="user_img" required
                                           accept="image/*"
                                           onchange="loadFile(this)">
                                    <!-- End Avatar -->

                                    <button type="button" id="deleteImage" onclick="deleteImg(this)"
                                            class="js-file-attach-reset-img btn btn-white">Delete
                                    </button>
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Nav -->
                            <div class="row form-group">
                                <label for="emailLabel" class="col-sm-3 col-form-label input-label">Tên</label>
                                <div class="col-sm-9">
                                    @if(!empty($err))
                                        <h6 class="text-danger">Lỗi: {{$err}} </h6>
                                    @endif
                                    <input type="text" class="form-control" name="full_name" id="" required
                                           placeholder="Tên user..." aria-label="clarice@example.com">
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <div class="row form-group">
                                <label for="emailLabel" class="col-sm-3 col-form-label input-label">User name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="" required
                                           placeholder="Tài khoản đăng nhập" aria-label="clarice@example.com">
                                </div>
                            </div>
                            <!-- End Form Group --><!-- Form Group -->
                            <div class="row form-group">
                                <label for="emailLabel" class="col-sm-3 col-form-label input-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control"
                                           pattern="(?=.*\d)(?=.*[A-Z]).{8,}"
                                           title="Mật khẩu phải chứa ít nhất 1 số, 1 ký tự viết hoa và không nhỏ hơn 8 ký tự"
                                           name="password" id="password" required
                                           placeholder="Mật khẩu đăng nhập">
                                </div>
                                <label for="emailLabel" class="col-sm-3 col-form-label input-label"></label>
                                <div id="message" class="col-sm-9">
                                    <h6>Mật khẩu phải chứa ít nhất:</h6>
                                    <div class="d-flex">
                                        <div class="mr-2 pr-2">
                                            <p id="capital" class="invalid">1 <b>ký tự viết hoa</b></p>
                                            <p id="number" class="invalid">1 <b>số</b></p>
                                        </div>
                                        <div class="pl-2">
                                            <p id="length" class="invalid">Ít nhất <b>8 ký tự</b></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- End Form Group -->
                            <div class="form-group row">
                                <label for="inputGroupMergeGenderSelect" class=" col-sm-3  input-label">Phân
                                    quyền</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="tio-user-outlined"></i>
                                        </span>
                                        </div>
                                        <select id="inputGroupMergeGenderSelect" name="quyen" class="custom-select"
                                                required>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">
                                Thêm <i class="tio-chevron-right"></i>
                            </button>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->

                </form>
            </div>
            <!-- End Content Step Form -->


        </div>
    </div>
@endsection
