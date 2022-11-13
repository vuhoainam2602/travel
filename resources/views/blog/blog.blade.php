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
