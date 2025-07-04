@extends('frontend.layouts.app')

@section('content')
    <!-- about banner -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>About Us</h1>
                <p><a href="/">Home</a>About Us</p>
            </div>
        </div>
    </div>
    <!-- End about banner -->

    <!-- Start About Us -->
    <div class="about-three-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                    <div class="about-three-content">
                        <div class="section-title left-title">
                            <span class="top-title">ABOUT US</span>
                            <h2>Designing Spaces, Elevating Experiences</h2>
                            <p>
                                At Idea Architects, we redefine spaces—both inside and out—with inspired design and
                                flawless execution.
                                Our passion for creativity and commitment to quality allow us to craft interiors that
                                captivate and
                                exteriors that inspire.
                                From concept to completion, we bring your vision to life with precision, elegance, and
                                unmatched
                                attention to detail.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="about-three-card">
                                    <i class="flaticon-experience"></i>
                                    <h3>Experience</h3>
                                    <p>Transformative interior & exterior designs</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="about-three-card">
                                    <i class="flaticon-support"></i>
                                    <h3>Quick Support</h3>
                                    <p>Instant help from our design team.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="default-btn">Learn More <i class="flaticon-next"></i></a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                    <div class="about-three-img">
                        <img src="assets/frontend/images/about/about-three.png" alt="Images" />
                        <div class="about-shape-three" data-aos="flip-left" data-aos-duration="3000" data-aos-once="true">
                            <img src="assets/frontend/images/about/about-shape.png" alt="Images" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Us -->

    <!-- Start Mission area -->
    {{-- =================== Mission --}}
    <!-- End Mission area -->

    <!-- Start Vision area -->
    {{-- =================== Vision --}}
    <!-- End Vision area -->

    <!-- team area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title center-title">
                <span class="top-title">TEAM MEMBER</span>
                <h2>Our Expert Team</h2>
            </div>
            <div class="row">

                @foreach ($users as $user)
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-team-member-content">
                            <div class="team-img">
                                <img style="width:306px; height:403px"
                                    src="{{ Storage::url($user?->profile?->picture) ?: '#' }}" alt="{{ $user->name }}">
                            </div>
                            <div class="single-team-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="team-content-bg">
                                        <h3 class="alex">{{ $user->name }}</h3>
                                        <p>{{ $user->profile->designation }}</p>
                                    </div>
                                    <div class="team-icon">
                                        <i class="flaticon-share share"></i>
                                        <ul>
                                            <li>
                                                <a href="{{ $user->profile->linkedin }}"
                                                    title="{{ $user->profile->linkedin }}" target="_blank">
                                                    Linkedin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ $user->profile->facebook }}"
                                                    title="{{ $user->profile->facebook }}" target="_blank">
                                                    Facebook
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ $user->profile->twitter }}"
                                                    title="{{ $user->profile->twitter }}" target="_blank">
                                                    Twitter
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ $user->profile->instagram }}"
                                                    title="{{ $user->profile->instagram }}" target="_blank">
                                                    Instagram
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End team area-->

    <!-- Start Partners area -->
    <div class="partners-are-two pb-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">CLIENTS</span>
                <h2>We are Trusted by</h2>
            </div>
            <div class="partners-logo-slider owl-carousel owl-theme">
                @foreach (getPartners() as $partner)
                    <div class="partners-logo">
                        <a href="javascript:void(0)">
                            <img style="width: 191px; height:97px" src="{{ Storage::url($partner->logo) }}"
                                alt="{{ $partner->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End partners area -->
@endsection
