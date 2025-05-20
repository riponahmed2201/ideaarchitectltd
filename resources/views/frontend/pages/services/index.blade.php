@extends('frontend.layouts.app')

@section('content')
    <!-- Page banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Our Services</h1>
                <p><a href="/">Home</a>Our Services</p>
            </div>
        </div>
    </div>
    <!-- End Page banner Area -->

    <!-- Start Our Services Area -->
    <div class="our-services-area pt-100 pb-70">
        <div class="container">
            {{-- <div class="section-title">
                <span class="top-title">SERVICES WE PROVIDED</span>
                <h2>Our Best Services</h2>
            </div> --}}
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="services-slider-content services-pages-content">
                        <div class="services-slider-img">
                            <a href="/services/details/12">
                                <img src="assets/frontend/images/services/services-slider-1.png" alt="Images">
                            </a>
                        </div>
                        <div class="single-feature-card">
                            <i class="flaticon-analysis analysis-icon"></i>
                            <h3><a href="/services/details/12">Business Technology</a></h3>
                            <p>Lorem ipsum dolor sit amesttur adipiscing elit sed do eiusmo tempor incididunt.</p>
                            <div class="feature-btn">
                                <a href="/services/details/12">
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                            <div class="feature-shape-1">
                                <img src="assets/frontend/images/feature-shape-1.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-slider-content services-pages-content">
                        <div class="services-slider-img">
                            <a href="/services/details/12">
                                <img src="assets/frontend/images/services/services-slider-2.png" alt="Images">
                            </a>
                        </div>
                        <div class="single-feature-card">
                            <i class="flaticon-investment analysis-icon"></i>
                            <h3><a href="/services/details/12">Website Technology</a></h3>
                            <p>Lorem ipsum dolor sit amesttur adipiscing elit sed do eiusmo tempor incididunt.</p>
                            <div class="feature-btn">
                                <a href="/services/details/12">
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                            <div class="feature-shape-1">
                                <img src="assets/frontend/images/feature-shape-1.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-slider-content services-pages-content">
                        <div class="services-slider-img">
                            <a href="/services/details/12">
                                <img src="assets/frontend/images/services/services-slider-3.png" alt="Images">
                            </a>
                        </div>
                        <div class="single-feature-card">
                            <i class="flaticon-life-insurance analysis-icon"></i>
                            <h3><a href="/services/details/12">Investment Technology</a></h3>
                            <p>Lorem ipsum dolor sit amesttur adipiscing elit sed do eiusmo tempor incididunt.</p>
                            <div class="feature-btn">
                                <a href="/services/details/12">
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                            <div class="feature-shape-1">
                                <img src="assets/frontend/images/feature-shape-1.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-slider-content services-pages-content">
                        <div class="services-slider-img">
                            <a href="/services/details/12">
                                <img src="assets/frontend/images/services/services-slider-6.png" alt="Images">
                            </a>
                        </div>
                        <div class="single-feature-card">
                            <i class="flaticon-fluctuation analysis-icon"></i>
                            <h3><a href="/services/details/12">Investment strategy</a></h3>
                            <p>Lorem ipsum dolor sit amesttur adipiscing elit sed do eiusmo tempor incididunt.</p>
                            <div class="feature-btn">
                                <a href="/services/details/12">
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                            <div class="feature-shape-1">
                                <img src="assets/frontend/images/feature-shape-1.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-slider-content services-pages-content">
                        <div class="services-slider-img">
                            <a href="/services/details/12">
                                <img src="assets/frontend/images/services/services-slider-7.png" alt="Images">
                            </a>
                        </div>
                        <div class="single-feature-card">
                            <i class="flaticon-cloud analysis-icon"></i>
                            <h3><a href="/services/details/12">Business solutions</a></h3>
                            <p>Lorem ipsum dolor sit amesttur adipiscing elit sed do eiusmo tempor incididunt.</p>
                            <div class="feature-btn">
                                <a href="/services/details/12">
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                            <div class="feature-shape-1">
                                <img src="assets/frontend/images/feature-shape-1.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-slider-content services-pages-content">
                        <div class="services-slider-img">
                            <a href="/services/details/12">
                                <img src="assets/frontend/images/services/services-slider-8.jpg" alt="Images">
                            </a>
                        </div>
                        <div class="single-feature-card">
                            <i class="flaticon-analytics analysis-icon"></i>
                            <h3><a href="/services/details/12">Market research</a></h3>
                            <p>Lorem ipsum dolor sit amesttur adipiscing elit sed do eiusmo tempor incididunt.</p>
                            <div class="feature-btn">
                                <a href="/services/details/12">
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                            <div class="feature-shape-1">
                                <img src="assets/frontend/images/feature-shape-1.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Services Area -->

    <!-- partners area -->
    @include('frontend.pages.home.partner')
    <!-- End partners area -->
@endsection
