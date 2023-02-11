@extends('layouts.layout')
@section("main")
    <main class="main">
        <section class="breadcrumb-banner" style="background: url('./images/sub-page.png');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="banner-content">
                            <h2>Blog</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="./index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-spacing blogs">
            <div class="container">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                        <form action="{{route('find_blog')}}" method="get" style="margin-bottom: 30px">
                        @csrf
                        <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control"
                                       name="s"
                                       placeholder="Tìm kiếm blog"
                                       aria-label="Search users" style="height: auto">
                                <button type="submit" class="btn btn-primary pt-1 pb-1 pr-2 pl-2" style="margin-left: 20px">Tìm kiếm</button>
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                </div>
                @if(!empty($mess))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{$mess}}
                        </div>
                    </div>
                @endif
                <div class="row">
                    @foreach($blogs as $b)
                        <div class="col-md-6 col-lg-4 animate__animated animate__zoomIn">
                            <a href="">
                                <div class="card tour-card wow fadeIn animated" style="visibility: visible;">
                                    <img src="{{$b->blog_image}}" alt="">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0">
                                                <span class="media-icon">
                                                    <img src="{{$b->user_image}}" alt="">
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 author-info">

                                                        <h5 class="m-0">{{$b->display_name}}</h5>
                                                        <p class="m-0">{{$b->role}}</p>


                                            </div>
                                            <div class="time flex-shrink-0">
                                                <span class="align-self-end">{{$b->blog_date}} </span>
                                            </div>

                                        </div>
                                        <h6>{{$b->blog_content}}</h6>
                                        <span class="read-more">Read More <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
