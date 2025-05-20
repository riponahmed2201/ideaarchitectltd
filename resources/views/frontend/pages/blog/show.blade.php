@extends('frontend.layouts.app')

@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Blog Details</h1>
                <p><a href="/">Home</a>Blog Details</p>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Our Blog Details Area -->
    <div class="blog-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <h2>
                            <a href="blog.html">The 17 Best Tools for Spying On Your Competition</a>
                        </h2>
                        <ul class="blog-date-list">
                            <li>
                                <i class="flaticon-calendar"></i><span> June 21, 2022</span>
                            </li>
                            <li>
                                <i class="flaticon-comment-white-oval-bubble"></i>04 Comments
                            </li>
                        </ul>
                        <div class="blog-details-img-two">
                            <img src="{{ asset('assets/frontend/images/blog/blog-image-1.jpg') }}" alt="Images">
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo viverra maecen
                            acusan lacus vel facilisis lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
                            tempor idunt ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus
                            commodo vivermenas accumsan lacus vel facilisis lorem ipsum dolor sit amet consectetur
                            adipiscing elit sed do eiusmtepor incididunt ut labore et dolore magna aliqua quis ipsum
                            suspendisse ultrices gravida risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo viverra maecen
                            acusan lacus vel facilisis lorem ipsum dolor sit amet consectetu.</p>
                        <h2>
                            <a href="blog.html">Content without backward compatible data.</a>
                        </h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo viverra maecen
                            acusan lacus vel facilisis lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
                            tempor idunt ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus
                            commodo vivermenas accumsan lacus vel facilisis lorem ipsum dolor sit amet consectetur
                            adipiscing elit sed do eiusmtepor incididunt ut labore et dolore magna aliqua quis ipsum
                            suspendisse ultrices gravida risus commodo viverra maecenas accumsan lacus vel facilisis.</p>

                        <div class="blog-post-card">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo viverra
                                maecen acusan lacus vel facilisis lorem ipsum dolor sit amet consectetu.</p>
                        </div>

                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo viverra maecen
                            acusan lacus vel facilisis lorem ipsum dolor sit amet consectetu.</p>

                        <div class="row">
                            <div class="col-lg-5 col-sm-6 col-md-5">
                                <div class="blog-details-bg-img">
                                    <div class="details-img"></div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-6 col-md-7">
                                <div class="blog-details-bg-img">
                                    <div class="details-images"></div>
                                </div>
                            </div>
                        </div>

                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua quis ipsum suspendisse ultrices gravida.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="tag-list">
                                <li>
                                    <span>Tags:</span>
                                </li>
                                <li>
                                    <a href="blog.html">Builder</a>
                                </li>
                                <li>
                                    <a href="blog.html">Cloud</a>
                                </li>
                                <li>
                                    <a href="blog.html">Map</a>
                                </li>
                            </ul>
                            <div class="details-list">
                                <ul>
                                    <li>
                                        <span>Share:</span>
                                    </li>
                                    <li>
                                        <a href="https://www.google.com/" target="_blank"><i
                                                class="flaticon-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/" target="_blank"><i
                                                class="flaticon-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <aside class="widget-area">
                        <div class="widget widget_pixab_posts_thumb">
                            <h3 class="widget-title">Recent Posts</h3>

                            <article class="item">
                                <a href="blog-details.html" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="blog-details.html">The Future of Enterprise API Development</a>
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="flaticon-calendar"></i>June 04, 2021
                                        </span>
                                    </div>
                                </div>
                            </article>

                            <article class="item">
                                <a href="blog-details.html" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="blog-details.html">The Next Big Challenge for Content Marketer</a>
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="flaticon-calendar"></i>June 04, 2021
                                        </span>
                                    </div>
                                </div>
                            </article>
                            <article class="item">
                                <a href="blog-details.html" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="blog-details.html">Affiliate Marketing – A Beginner’s Guide</a>
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="flaticon-calendar"></i>June 04, 2021
                                        </span>
                                    </div>
                                </div>
                            </article>

                            <article class="item">
                                <a href="blog-details.html" class="thumb">
                                    <span class="fullimage cover bg4" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="blog-details.html">A solution built for teacher and students</a>
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="flaticon-calendar"></i>June 04, 2021
                                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="details-contact">
                            <h2>Contact</h2>

                            <div class="contact-details-bg">
                                <i class="flaticon-telephone"></i>
                                <h4>Phone</h4>
                                <a href="tel:+089027392793">+089027392793</a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-envelope"></i>
                                <h4>Email</h4>
                                <a href=""><span>[email&#160;protected]</span></a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-placeholder"></i>
                                <h4>Address</h4>
                                <p>50 Nortambiya, UK.</p>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Blog Details Area -->
@endsection
