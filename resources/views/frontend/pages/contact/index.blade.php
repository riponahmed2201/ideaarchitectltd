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
                        <p>House: 1259, Road: 10, Avenue-2, Mirpur DOHS, </p>
                        <p>Dhaka, Bangladesh</p>
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
                        <iframe class="map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53073306.51661324!2d8.600503965399119!3d35.717915982829226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2sUkraine!5e0!3m2!1sen!2sbd!4v1645951260473!5m2!1sen!2sbd"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-group-from">
                        <div class="section-title left-title">
                            <h2>Ready to Get Started?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
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

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="phone_numbertwo" placeholder="Subject*"
                                            required="" data-error="Please enter your subject" class="form-control">
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
