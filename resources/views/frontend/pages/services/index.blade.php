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
                @forelse ($services as $service)
                    @php
                        $serviceDetailsRoute = route('services.show', [
                            'category_slug' => $service->category->slug,
                            'service_slug' => $service->slug,
                        ]);
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="services-slider-content services-pages-content">
                            <div class="services-slider-img">
                                <a href="{{ $serviceDetailsRoute }}">
                                    <img style="width:416px; height:276px" src="{{ Storage::url($service->image) }}">
                                </a>
                            </div>
                            <div class="single-feature-card">
                                <h3><a href="{{ $serviceDetailsRoute }}">{{ $service->name }}</a>
                                </h3>
                                <p>{{ $service->short_description }}</p>
                                <div class="feature-btn">
                                    <a href="{{ $serviceDetailsRoute }}">
                                        <i class="flaticon-next"></i>
                                    </a>
                                </div>
                                <div class="feature-shape-1">
                                    <img src="{{ asset('assets/frontend/images/feature-shape-1.png') }}" alt="images">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Our Services Area -->

    <!-- partners area -->
    @include('frontend.pages.home.partner')
    <!-- End partners area -->
@endsection
