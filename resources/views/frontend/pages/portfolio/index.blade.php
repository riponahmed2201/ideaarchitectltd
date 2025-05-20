@extends('frontend.layouts.app')

@section('content')
    <!-- about banner -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Our Portfolio</h1>
                <p><a href="/">Home</a>Our Portfolio</p>
            </div>
        </div>
    </div>
    <!-- End about banner -->

    <!-- Start Our Portfolio Area -->
    <div class="our-portfolio-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">EXPLORE RECENT PORTFOLIOS</span>
                <h2>Few Corporate Portfolios</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="portfolio-details.html">
                            <img src="assets/frontend/images/portfolios/portfolios-img-2.jpg" alt="image">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="assets/frontend/images/portfolios/portfolios-img-2.jpg">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>Development</p>
                            <h3>
                                <a href="portfolio-details.html">Corporate Website</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="portfolio-details.html">
                            <img src="assets/frontend/images/portfolios/portfolios-img-3.jpg" alt="image">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="assets/frontend/images/portfolios/portfolios-img-3.jpg">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>Senior Designer</p>
                            <h3>
                                <a href="portfolio-details.html">Investment Technology</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="portfolio-details.html">
                            <img src="assets/frontend/images/portfolios/portfolios-img-4.jpg" alt="image">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="assets/frontend/images/portfolios/portfolios-img-4.jpg">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>Senior Development</p>
                            <h3>
                                <a href="portfolio-details.html">Website Technology</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="portfolio-details.html">
                            <img src="assets/frontend/images/portfolios/portfolios-img-1.jpg" alt="image">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="assets/frontend/images/portfolios/portfolios-img-1.jpg">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>Factory Manager</p>
                            <h3>
                                <a href="portfolio-details.html">Investment strategy</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="portfolio-details.html">
                            <img src="assets/frontend/images/portfolios/portfolios-img-5.jpg" alt="image">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="assets/frontend/images/portfolios/portfolios-img-4.jpg">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>Marketing Management</p>
                            <h3>
                                <a href="portfolio-details.html">Corporate Technology</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="portfolio-details.html">
                            <img src="assets/frontend/images/portfolios/portfolios-img-6.jpg" alt="image">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="assets/frontend/images/portfolios/portfolios-img-4.jpg">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>Designer</p>>
                            <h3>
                                <a href="portfolio-details.html">Business solutions</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-area">
                <a href="/portfolio" class="prev page-numbers">
                    <i class="flaticon-left"></i>
                </a>

                <span class="page-numbers current" aria-current="page">1</span>
                <a href="/portfolio" class="page-numbers">2</a>

                <a href="/portfolio" class="prev page-numbers">
                    <i class="flaticon-next"></i>
                </a>

            </div>
        </div>
    </div>
    <!-- End Our Portfolio Area -->
@endsection
