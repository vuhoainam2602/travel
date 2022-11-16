@extends('layouts.layout')
@section("main")
    <main class="main">
        <section class="breadcrumb-banner" style="background: url('./images/sub-page.png');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="banner-content">
                            <h2>Contact</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="./index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-spacing contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <a href="./contact.html#">
                                    <i class="far fa-envelope"></i>
                                </a>
                                <p class="contact-text">Email Address: </p>
                            </div>
                            <div class="h-border"></div>
                            <div class="contact-sub-text">
                                <p>
                                    <a href="mailto:nhom7@gmail.com.vn">nhom7@gmail.com.vn</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <a href="./contact.html#">
                                    <i class="fas fa-phone-alt"></i>
                                </a>
                                <p class="contact-text">Phone Number: </p>
                            </div>
                            <div class="h-border"></div>
                            <div class="contact-sub-text">
                                <p>
                                    <a href="./contact.html#">0787 177 118</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center contact-content">
                    <div class="col-md-5 contact-img">
                        <img class="tilt-img" src="{{Request::root().'/images/contact-img.png'}}" alt="img">
                    </div>
                    <div class="col-md-7">
                        @if(!empty($success))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                {{$success}}
                            </div>
                        </div>
                        @endif
                        <div class="contact-form">
                            <form action="{{route('contact')}}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <input type="text" class="form-control" id="your_name" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control" id="email_address" name="email" placeholder="Enter email address" required>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="keyword" rows="6" name="text_content" placeholder="Type you keyword" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
