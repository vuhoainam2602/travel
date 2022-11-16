<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    {{--    <link rel="icon" href="%PUBLIC_URL%/favicon.ico"/>--}}
    <link href="https://cdn-icons-png.flaticon.com/512/201/201623.png" type="image/x-icon" rel="icon">
    <link href="https://cdn-icons-png.flaticon.com/512/201/201623.png" type="image/x-icon" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>
    <meta
        name="description"
        content="Web site created using create-react-app"
    />

    <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap"
        rel="stylesheet"
    />
    <link rel="manifest" href="%PUBLIC_URL%/manifest.json"/>

    <link
        rel="stylesheet"
        href="{{Request::root().'/css/css_admin/theme.min.css'}}"
    />
    <link
        rel="stylesheet"
        href="{{Request::root().'/css/css_admin/vendor.min.css'}}"
    />
    <link
        rel="stylesheet"
        href="{{Request::root().'/js/libs_admin/icon-set/style.css'}}"/>
    <title>Login</title>
    <script src="https://cdn.tiny.cloud/1/0cvgyq8htwfa5cldcb7inwo3d6meev709oz5fuwnlml6q7iz/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" type="text/css" id="mce-u0" referrerpolicy="origin"
          href="https://cdn.tiny.cloud/1/0cvgyq8htwfa5cldcb7inwo3d6meev709oz5fuwnlml6q7iz/tinymce/5.10.4-130/skins/ui/oxide/skin.min.css">
</head>
<body>
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="position-fixed top-0 right-0 left-0 bg-img-hero"
         style="height: 32rem; background-image: url({{Request::root().'/images/abstractbg4.svg'}});">
        <!-- SVG Bottom Shape -->
        <figure class="position-absolute right-0 bottom-0 left-0">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                <polygon fill="#fff" points="0,273 1921,273 1921,0 "></polygon>
            </svg>
        </figure>
        <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <!-- Card -->
                <div class="">
                    <div class="">
                        <!-- Form -->
                        <form class="js-validate" action="{{Request::root().'/admin/action-login'}}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="text-center">
                                <div class="mb-5">
                                    <h1 class="display-4">Đăng nhập</h1>
                                    <h6 class="text-danger">{{empty($err)?'':$err}}</h6>

                                </div>

                            </div>

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signinSrEmail">Tên tài khoản</label>

                                <input type="email" class="form-control form-control-lg" name="username" id="signinSrEmail"
                                       tabindex="1" placeholder="email@address.com" aria-label="email@address.com"
                                       required="" data-msg="Please enter a valid email address.">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrPassword" tabindex="0">
                        <span class="d-flex justify-content-between align-items-center">
                          Password
                        </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg"
                                           name="password" id="signupSrPassword" placeholder="8+ characters required"
                                           aria-label="8+ characters required" required=""
                                          >
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:;">
                                            <i id="changePassIcon" class="tio-hidden-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->


                            <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->


            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
<!-- End New project Modal -->
<!-- ========== END SECONDARY CONTENTS ========== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="{{Request::root().'/js/js_admin/vendor.min.js'}}"></script>
<script src="{{Request::root().'/js/js_admin/theme.min.js'}}"></script>
</body>
</html>
