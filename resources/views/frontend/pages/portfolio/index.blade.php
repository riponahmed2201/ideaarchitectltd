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
                <h2>Our Latest Portfolios</h2>
            </div>
            <div class="row">
                @forelse ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolios-item portfolios-image">
                            <a href="{{ route('portfolio.show', $portfolio->id) }}">
                                <img src="{{ Storage::url($portfolio->image) }}" alt="image">
                            </a>
                            <div class="portfolios">
                                <a data-fancybox="gallery" href="{{ Storage::url($portfolio->image) }}">
                                    <i class="flaticon-add"></i>
                                </a>
                            </div>
                            <div class="portfolios-content">
                                <p>{{ $portfolio->service->name }}</p>
                                <h3>
                                    <a href="{{ route('portfolio.show', $portfolio->id) }}">{{ $portfolio->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-danger text-center">No Portfolio Found!</p>
                @endforelse
            </div>
            <!-- Display pagination links -->
            <div id="data">
                {{ $portfolios->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
    <!-- End Our Portfolio Area -->
@endsection
