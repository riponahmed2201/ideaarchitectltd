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
                                @foreach ($services as $service)
                                    <li>
                                        <a href="{{ route('services.show', ['category_slug' => $service->category->slug, 'service_slug' => $service->slug]) }}"
                                            class="active">{{ $service->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="details-contact" data-aos="fade-right" data-aos-duration="2500" data-aos-once="true">
                            <h2>Contact</h2>

                            <div class="contact-details-bg">
                                <i class="flaticon-telephone"></i>
                                <h4>Phone</h4>
                                <a href="tel:+8801732-691745">+8801732-691745</a> <br>
                                <a href="tel:+8801738-275126">+8801738-275126</a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-envelope"></i>
                                <h4>Email</h4>
                                <a href="javascript:void(0)">idea.architectsbd@gmail.com</span></a>
                            </div>

                            <div class="contact-details-bg">
                                <i class="flaticon-placeholder"></i>
                                <h4>Address</h4>
                                <p>House: 1259, Road: 10, Avenue-2, Mirpur DOHS, Dhaka, Bangladesh</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                    <div class="services-details-content">
                        <div class="services-details-img">
                            <img src="{{ Storage::url($serviceInfo->image) }}" alt="Images">
                        </div>
                        <h3>{{ $serviceInfo->name }}</h3>
                        <div>{{ $serviceInfo->short_description }}</div>
                        <div>{{ $serviceInfo->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Details Area -->
@endsection
