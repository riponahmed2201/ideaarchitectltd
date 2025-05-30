@extends('frontend.layouts.app')

@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Contact Us</h1>
                <p><a href="/">Home</a>Contact Us</p>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Contact Area -->
    <div class="contact-area pt-100 pb-70">
        <div class="container">
            <div class="section-title center-title">
                <span class="top-title">CONTACT US</span>
                <h2>Our Address</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-telephone"></i>
                        <h3>Call for help:</h3>
                        <p>Phone 1:<a href="tel:+8801732-691745">+8801732-691745</a></p>
                        <p>Phone 2:<a href="tel:+8801738-275126">+8801738-275126</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-envelope"></i>
                        <h3>Mail for information:</h3>
                        <p>Support: <a href="">
                                <span>idea.architectsbd@gmail.com</span>
                            </a>
                        </p>
                        <p>Email: <a href=""><span>idea.architectsbd@gmail.com</span></a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-placeholder"></i>
                        <h3>Head office address:</h3>
                        <p>Mirpur - 6, Dhaka-1216,</p>
                        <p>Bangladesh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- contact group -->
    <div class="contact-group pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="maps">
                        <div class="embed-map-responsive">
                            <div class="embed-map-container"><iframe class="embed-map-frame" frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?width=600&height=400&hl=en&q=Mirpur%20-%206%2C%20Dhaka-1216%2C%20Bangladesh&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe><a
                                    href="https://sprunkiretake.net"
                                    style="font-size:2px!important;color:gray!important;position:absolute;bottom:0;left:0;z-index:1;max-height:1px;overflow:hidden">sprunki
                                    retake</a></div>
                            <style>
                                .embed-map-responsive {
                                    position: relative;
                                    text-align: right;
                                    width: 100%;
                                    height: 0;
                                    padding-bottom: 66.66666666666666%;
                                }

                                .embed-map-container {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                    height: 100%;
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                }

                                .embed-map-frame {
                                    width: 100% !important;
                                    height: 100% !important;
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-group-from">
                        <div class="section-title left-title">
                            <h2>Ready to Get Started?</h2>
                        </div>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name*" required="" data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" placeholder="Phone*"
                                            required="" data-error="Please enter your number" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email*" required="" data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message*"
                                            required="" data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn contact">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End contact group -->
@endsection
