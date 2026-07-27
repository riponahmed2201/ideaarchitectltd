@extends('frontend.layouts.app')

@section('title', $portfolio->title . ' - Idea Architect Limited')

@section('content')
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Portfolio Details</h1>
                <p><a href="/">Home</a> <a href="{{ route('portfolio.index') }}">Portfolio</a></p>
            </div>
        </div>
    </div>

    <div class="corporate-website-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="corporate-image">
                        <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="corporate-website-content">
                        <h2>{{ $portfolio->title }}</h2>
                        <div>{!! html_entity_decode($portfolio->description) !!}</div>
                        <ul>
                            <li><i class="flaticon-tag"></i><span>Category:</span> {{ $portfolio->space_type_label }}</li>
                            <li><i class="flaticon-user"></i><span>Client:</span> {{ $portfolio->client_name }}</li>
                            @if($portfolio->service)
                                <li><i class="flaticon-settings"></i><span>Service:</span> {{ $portfolio->service->name }}</li>
                            @endif
                            @if($portfolio->area_sft)
                                <li><i class="flaticon-trust"></i><span>Area:</span> {{ $portfolio->area_sft }} sft</li>
                            @endif
                            @if($portfolio->location)
                                <li><i class="flaticon-placeholder"></i><span>Location:</span> {{ $portfolio->location }}</li>
                            @endif
                            <li><i class="flaticon-calendar-1"></i><span>Status:</span> {{ $portfolio->status_type_label }}</li>
                            <li><i class="flaticon-calendar-1"></i><span>Date:</span> {{ $portfolio->date }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($portfolioList->count())
        <div class="our-portfolio-area pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Related Work</h2>
                </div>
                <div class="corporate-website-slider owl-carousel owl-theme">
                    @foreach ($portfolioList as $item)
                        <div class="portfolios-item portfolios-image">
                            <a href="{{ route('portfolio.show', $item->slug) }}">
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
                            </a>
                            <div class="portfolios-content">
                                <p>{{ $item->space_type_label }}</p>
                                <h3>
                                    <a href="{{ route('portfolio.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
