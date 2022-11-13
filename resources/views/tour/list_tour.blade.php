@extends('layouts.layout')
@section("main")
    <main class="main">
        <section class="breadcrumb-banner" style="background: url('./images/sub-page.png');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="banner-content">
                            <h2>Tour List</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="./index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Tour List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tours">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 tours-main tour-main-list">
                        <div class="row list-tour-group">
                            @foreach($tours as $t)
                            <div class="item col-md-6 col-lg-4 tour-group-item animate__animated animate__slideInLeft">
                                <a href="{{route('tour_detail',['slug'=>$t->tour_slug])}}">
                                    <div class="card tour-card wow fadeIn animated animated" style="visibility: visible;">
                                        <img src="{{$t->tour_image}}" alt="" style="border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                        <span class="tour-duration"> {{$t->tour_time}} Days
                                            </span>
                                        <div class="card-body">
                                            <div class="tour-tags">
                                                <span class="tour-price">From ${{$t->tour_cost}}</span>
                                                <span class="tour-rating">
                                                        <b>⭐</b>
                                                        <b>⭐</b>
                                                        <b>⭐</b>
                                                        <b>⭐</b>
                                                        <b>⭐</b>
                                                        @php
                                                            echo(rand(10,100));
                                                        @endphp
                                                    </span>
                                            </div>
                                            <h6>{{$t->tour_title}}</h6>
                                            <p class="mb-0">{{$t->tour_desc}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
