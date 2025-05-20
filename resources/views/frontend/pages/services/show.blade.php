@extends('frontend.layouts.app')

@section('content')
    <!-- Page banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Services Details</h1>
                <p><a href="/">Home</a>Services Details</p>
            </div>
        </div>
    </div>
    <!-- End Page banner Area -->

    <!-- Start Services Details Area -->
    <div class="services-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="services-details-left">

                        <div class="categories-card" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                            <h2>All Services</h2>
                            <ul class="business">
                                <li>
                                    <a href="#">Business Technology</a>
                                </li>
                                <li>
                                    <a href="#">Investments Analysis</a>
                                </li>
                                <li>
                                    <a href="#">Insurance Planning</a>
                                </li>
                                <li>
                                    <a href="#">Investment strategy</a>
                                </li>
                                <li>
                                    <a href="#">Business solutions</a>
                                </li>
                                <li>
                                    <a href="#">Market research</a>
                                </li>
                            </ul>
                        </div>
                        <div class="details-contact" data-aos="fade-right" data-aos-duration="2500" data-aos-once="true">
                            <h2>Contact</h2>

                            <div class="contact-details-bg">
                                <i class="flaticon-telephone"></i>
                                <h4>Phone</h4>
                                <a href="tel:+089027392793">+089027392793</a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-envelope"></i>
                                <h4>Email</h4>
                                <a href="/cdn-cgi/l/email-protection#f29a979e9e9d829b8a9390b2959f939b9edc919d9f"><span
                                        class="__cf_email__"
                                        data-cfemail="fa929f9696958a93829b98ba9d979b9396d4999597">[email&#160;protected]</span></a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-placeholder"></i>
                                <h4>Address</h4>
                                <p>50 Nortambiya, UK.</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                    <div class="services-details-content">
                        <div class="services-details-img">
                            <img src="{{ asset('assets/frontend/images/services/services-details-img-2.jpg') }}"
                                alt="Images">
                        </div>
                        <h3>Business Technology</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore elore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                            maecenas accumslacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                            gravida. Risus commodo viverra maerem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolmgna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <ul class="details-list">
                                    <li>
                                        <i class="flaticon-check"></i>Cost of supplies and equipment point
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>Change the volume of expected of contact
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>Bibend auctor nisi elit volume are so beguiled
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <ul class="details-list">
                                    <li>
                                        <i class="flaticon-check"></i>Bibend auctor nisi elit volume are so beguiled
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>Change the volume of expected of contact
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>Cost of supplies and equipment
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3>Benefits With Our Service</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore elore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                            maecenas accumslacus vel facilisis. uspendisse ultrices gravida ed do eiusmod tempor</p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="services-details-img">
                                    <img src="{{ asset('assets/frontend/images/services/services-details-img-3.jpg') }}"
                                        alt="Images">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="services-details-img">
                                    <img src="{{ asset('assets/frontend/images/services/services-details-img-1.jpg') }}"
                                        alt="Images">
                                </div>
                            </div>
                        </div>
                        <h3>Analyzing Business Technology services</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore elore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                            maecenas accumslacus vel facilisis. uspendisse ultrices gravida ed do eiusmod tempor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Details Area -->
@endsection
