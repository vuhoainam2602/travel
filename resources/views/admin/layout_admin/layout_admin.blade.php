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
    <title>Admin Travel</title>
    <script src="https://cdn.tiny.cloud/1/0cvgyq8htwfa5cldcb7inwo3d6meev709oz5fuwnlml6q7iz/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" type="text/css" id="mce-u0" referrerpolicy="origin"
          href="https://cdn.tiny.cloud/1/0cvgyq8htwfa5cldcb7inwo3d6meev709oz5fuwnlml6q7iz/tinymce/5.10.4-130/skins/ui/oxide/skin.min.css">
    <style>
        /* Style all input fields */
        select {
            width: 527px;
        }
        .navbar-vertical-aside .navbar-brand-wrapper {
            height: auto;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
        }

        /* Style the container for inputs */
        .container {
            background-color: #ffffff;
            padding: 20px;
        }

        /* The message box is shown when the user clicks on the password field */
        #message {
            display: none;
            background: #ffffff;
            color: #000;
            position: relative;
            padding: 5px;
            margin-top: 10px;
        }

        #message p {
            padding: 5px 5px;
            font-size: 12px;
            margin-bottom: 0px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
            margin-bottom: 5px;
        }

        .valid:before {
            position: relative;
            left: -5px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
            margin-bottom: 5px;
        }

        .invalid:before {
            position: relative;
            left: -5px;
            content: "✖";
        }

    </style>

</head>
<body class="footer-offset footer-offset has-navbar-vertical-aside navbar-vertical-aside-show-xl">

<!-- Search Form -->
<div
    id="searchDropdown"
    class="hs-unfold-content dropdown-unfold search-fullwidth d-md-none hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated"
    data-hs-target-height="0"
    data-hs-unfold-content=""
    data-hs-unfold-content-animation-in="fadeIn"
    data-hs-unfold-content-animation-out="fadeOut"
    style="animation-duration: 300ms;"
>
    <form class="input-group input-group-merge input-group-borderless">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="tio-search"></i>
            </div>
        </div>

        <input
            class="form-control rounded-0"
            type="search"
            placeholder="Search in front"
            aria-label="Search in front"
        />

        <div class="input-group-append">
            <div class="input-group-text">
                <div class="hs-unfold">
                    <a
                        class="js-hs-unfold-invoker"
                        href="javascript:;"
                        data-hs-unfold-options='{
                     "target": "#searchDropdown",
                     "type": "css-animation",
                     "animationIn": "fadeIn",
                     "hasOverlay": "rgba(46, 52, 81, 0.1)",
                     "closeBreakpoint": "md"
                   }'
                        data-hs-unfold-target="#searchDropdown"
                        data-hs-unfold-invoker=""
                    >
                        <i class="tio-clear tio-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End Search Form -->

<!-- ========== HEADER ========== -->
<header
    id="header"
    class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered"
>
    <div class="navbar-nav-wrap">
        <div class="navbar-brand-wrapper">
            <!-- Logo -->
            <a class="navbar-brand" href="" aria-label="Front">
                <img
                    class="navbar-brand-logo"
                    src="{{Request::root().'/images/logo.png'}}"
                    alt="Logo"
                />

            </a>
            <!-- End Logo -->
        </div>
        <div class="navbar-nav-wrap-content-left menu-head">

            {{--            <div class="hs-unfold mr-2 " title="Tạo mới sitemap.xml" id="importFileKml">--}}
            {{--                <a class="js-hs-unfold-invoker btn btn-icon btn-icon-head btn-ghost-secondary rounded-circle"--}}
            {{--                   target="_blank"--}}
            {{--                   href="{{Request::root().'/rd/xml/a/genrate-sitemap'}}">--}}
            {{--                    <img class="avatar avatar-xs avatar-4by3"--}}
            {{--                         src="{{Request::root().'/images/icons8-xml-file-64.png'}}"--}}
            {{--                         alt="Image Description" style="width: 25px; height: 25px;">--}}
            {{--                </a>--}}
            {{--            </div>--}}

        </div>
        <div class="navbar-nav-wrap-content-right">
            <!-- Navbar -->
            <ul class="navbar-nav align-items-center flex-row">

                <li class="nav-item">
                    <!-- Account -->

                    <div class="hs-unfold d-flex align-items-center">
                        <p id="name" class="bold pb-0 mb-0 mr-2"><strong>{{session()->get('tk_user')[0]}}</strong></p>
                        <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper mr-2" href="javascript:;"
                           data-hs-unfold-target="#accountNavbarDropdown" data-hs-unfold-invoker="">
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img"
                                     src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png"
                                     alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"> </span>
                            </div>
                        </a>


                    </div>
                    <!-- End Account -->
                </li>
            </ul>
            <!-- End Navbar -->
        </div>

    </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<!-- Navbar Vertical -->
<aside
    class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered navbar-vertical-aside-initialized"
>
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <div class="navbar-brand-wrapper justify-content-between">
                <!-- Logo -->

                <a class="navbar-brand" href="{{Request::root().'/admin'}}" aria-label="Front">
                    <img
                        class="navbar-brand-logo"
                        src="{{Request::root().'/images/favicon.png'}}"
                        alt="Logo"
                    />
                </a>

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button
                    type="button"
                    class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark"
                >
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Content -->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Apps -->
                    <!-- End Apps -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a
                            class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                            href="javascript:;"
                            title="Apps"
                        >

                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"
                            >Quản lý bài viết
                   </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a
                                    class="nav-link "
                                    href="{{Request::root().'/admin/them-bai-viet'}}"
                                    title="Kanban"
                                >
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Thêm bài viết</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="navbar-vertical-aside-has-menu ">
                        <a
                            class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                            href="javascript:;"
                            title="Apps"
                        >

                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"
                            >Quản lý user
                    </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a
                                    class="nav-link "
                                    href="{{Request::root().'/admin/them-user'}}"
                                    title="Kanban"
                                >
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Thêm user</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link "
                                    href="{{Request::root().'/admin/index-user'}}"
                                    title="Calendar"
                                >
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate"
                                    >Danh sách user
                        <span class="badge badge-info badge-pill ml-1"
                        >New</span
                        ></span
                                    >
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="navbar-vertical-aside-has-menu text-center ">
                        <a href="{{route('action_logout')}}" class="btn btn-primary pt-1 pb-1 pr-2 pl-2">Logout</a>

                    </li>

                </ul>
            </div>
            <!-- End Content -->


        </div>
    </div>
</aside>
<div
    class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-mobile-overlay"
></div>
<!-- End Navbar Vertical -->

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">

    @yield("main")

    <!-- End Row -->
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


{{--Tìm kiếm và chọn bài viết liên quan--}}
<script src="{{Request::root().'/js/js_admin/multisearch.js'}}"></script>
<script>
    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)')
        .matches
    tinymce.init({
        selector: 'input#mytextarea',
        plugins:
            'print visualblocks image preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar:
            'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        content_css: 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
        formats: {

            bold: {inline: 'strong', classes: 'bold'},
            italic: {inline: 'i', classes: 'italic'},
            underline: {inline: 'u', classes: 'underline', exact: true},
            strikethrough: {inline: 'del'},
            forecolor: {
                inline: 'span',
                classes: 'forecolor',
                styles: {color: '%value'}
            },
            hilitecolor: {
                inline: 'span',
                classes: 'hilitecolor',
                styles: {backgroundColor: '%value'}
            },
            custom_format: {
                block: 'h1',
                attributes: {title: 'Header'},
                styles: {color: 'red'}
            }
        },
        link_list: [
            {title: 'My page 1', value: 'https://www.tiny.cloud'},
            {title: 'My page 2', value: 'http://www.moxiecode.com'}
        ],
        image_list: [
            {title: 'My page 1', value: 'https://www.tiny.cloud'},
            {title: 'My page 2', value: 'http://www.moxiecode.com'}
        ],
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Some class', value: 'class-name'}
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                })
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                })
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                })
            }
        },
        templates: [
            {
                title: 'New Table',
                description: 'creates a new table',
                content:
                    '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content:
                    '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 1000,
        image_caption: true,
        quickbars_selection_toolbar:
            'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        style_formats: [
            {
                title: 'Headers', items: [
                    {title: 'h1', block: 'h1'},
                    {title: 'h2', block: 'h2'},
                    {title: 'h3', block: 'h3'},
                    {title: 'h4', block: 'h4'},
                    {title: 'h5', block: 'h5'},
                    {title: 'h6', block: 'h6'}
                ]
            },

            {
                title: 'Blocks', items: [
                    {title: 'p', block: 'p'},
                    {title: 'div', block: 'div'},
                    {title: 'pre', block: 'pre'}
                ]
            },

            {
                title: 'Containers', items: [
                    {title: 'section', block: 'section', wrapper: true, merge_siblings: false},
                    {title: 'article', block: 'article', wrapper: true, merge_siblings: false},
                    {title: 'blockquote', block: 'blockquote', wrapper: true},
                    {title: 'hgroup', block: 'hgroup', wrapper: true},
                    {title: 'aside', block: 'aside', wrapper: true},
                    {title: 'figure', block: 'figure', wrapper: true}
                ]
            }
        ],
        visualblocks_default_state: true,
        end_container_on_empty_block: true,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
<script>
    // valitade password
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
<script>
    $('.js-navbar-vertical-aside-menu-link ').click(function () {
        console.log("click")
        $(this).parent().children('.nav-sub').toggleClass('d-block')
    })
</script>

<script>
    var loadFile = function (e) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    var deleteImg = function (e) {
        var output = document.getElementById('output');
        output.src = '';
    };

    function toSlug(str) {
        // Chuyển hết sang chữ thường
        str = str.toLowerCase();

        // xóa dấu
        str = str
            .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
            .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp

        // Thay ký tự đĐ
        str = str.replace(/[đĐ]/g, 'd');

        // Xóa ký tự đặc biệt
        str = str.replace(/([^0-9a-z-\s])/g, '');

        // Xóa khoảng trắng thay bằng ký tự -
        str = str.replace(/(\s+)/g, '-');

        // Xóa ký tự - liên tiếp
        str = str.replace(/-+/g, '-');

        // xóa phần dư - ở đầu & cuối
        str = str.replace(/^-+|-+$/g, '');

        // return
        return str;
    }

    var onChangeInput = function (e, id) {
        var ele = document.getElementById(id);
        console.log(event.target.value);
        document.getElementById("slug").value = toSlug(event.target.value).split(' ').join('-');
        document.getElementById("metaTitle").value = event.target.value;
    }
    var onChangeInput_edit = function (e, id) {
        if (confirm("Bạn có muốn thay đổi slug") == true) {
            var ele = document.getElementById(id);
            console.log(event.target.value);
            document.getElementById("slug").value = toSlug(event.target.value).split(" ").join("-");
        }
        document.getElementById("metaTitle").value = event.target.value;
    }
</script>
<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
        document.write(
            '<script src="../assets/vendor/babel-polyfill/polyfill.min.js"><\/script>'
        )
</script>
<script>
    const tieu_de = document.querySelector('#tieu_de')
    const mo_ta = document.getElementById('mo_ta')
    const count = document.getElementById('count')
    const count1 = document.getElementById('count1')
    // const max =60;
    console.log();
    count.innerHTML = tieu_de.value.length;
    count1.innerHTML = mo_ta.value.length;
    tieu_de.onkeyup = (e) => {
        // if(e.target.value.length > max){
        //     alert("Bạn nhập quá số ký tự quy định");
        // }
        count.innerHTML =  e.target.value.length;
    };

    mo_ta.onkeyup = (e) => {

        count1.innerHTML =  e.target.value.length;
    };



</script>

<div class="hs-unfold-overlay"></div>
</body>
</html>
