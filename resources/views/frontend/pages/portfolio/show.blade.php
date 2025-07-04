@extends('frontend.layouts.app')

@section('content')
    <!-- Page Banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Portfolio Details</h1>
                <p><a href="/">Home</a>Portfolios</p>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area-->

    <!-- Start Corporate Website Area -->
    <div class="corporate-website-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                    <div class="corporate-image">
                        <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                    <div class="corporate-website-content">
                        <h2>{{ $portfolio->title }}</h2>
                        <div>
                            {!! html_entity_decode($portfolio->description) !!}
                        </div>

                        <ul>
                            <li><i class="flaticon-tag"></i><span>Service:</span> {{ $portfolio->service->name }}</li>
                            <li><i class="flaticon-user"></i><span> Client:</span>{{ $portfolio->client_name }}</li>
                            <li><i class="flaticon-calendar-1"></i><span> Date:</span> {{ $portfolio->date }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Corporate Website Area -->

    <!-- Start Portfolio Details Area -->
    <div class="our-portfolio-area pb-70">
        <div class="container">
            <div class="corporate-website-slider owl-carousel owl-theme">
                @foreach ($portfolioList as $item)
                    <div class="portfolios-item portfolios-image">
                        <a href="{{ route('portfolio.show', $item->id) }}">
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
                        </a>
                        <div class="portfolios">
                            <a data-fancybox="gallery" href="{{ Storage::url($item->image) }}">
                                <i class="flaticon-add"></i>
                            </a>
                        </div>
                        <div class="portfolios-content">
                            <p>{{ $item->service->name }}</p>
                            <h3>
                                <a href="{{ route('portfolio.show', $item->id) }}">{{ $item->title }}</a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Portfolio Details Area -->
@endsection
