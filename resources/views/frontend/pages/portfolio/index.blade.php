@extends('frontend.layouts.app')

@section('title', 'Our Portfolio - Idea Architect Limited')

@section('content')
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Our Portfolio</h1>
                <p><a href="/">Home</a> Portfolio</p>
            </div>
        </div>
    </div>

    <div class="our-portfolio-area pt-100 pb-100">
        <div class="container">
            <div class="section-title center-title">
                <span class="top-title">EXPLORE OUR WORK</span>
                <h2>Interior & Exterior Projects</h2>
            </div>

            <div class="text-center mb-5">
                @php
                    $filters = [
                        'all' => 'All',
                        'residential' => 'Residential',
                        'office' => 'Office',
                        'exterior' => 'Exterior',
                        'commercial' => 'Commercial',
                        'public' => 'Public',
                    ];
                @endphp
                @foreach ($filters as $key => $label)
                    <a href="{{ route('portfolio.index', $key === 'all' ? [] : ['type' => $key]) }}"
                        class="default-btn me-2 mb-2 {{ ($activeFilter ?? 'all') === $key ? '' : 'btn-outline' }}"
                        style="{{ ($activeFilter ?? 'all') === $key ? '' : 'background:transparent;color:inherit;border:1px solid #ddd;' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="row">
                @forelse ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolios-item portfolios-image">
                            <a href="{{ route('portfolio.show', $portfolio->slug) }}">
                                <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}">
                            </a>
                            <div class="portfolios">
                                <a data-fancybox="gallery" href="{{ Storage::url($portfolio->image) }}">
                                    <i class="flaticon-add"></i>
                                </a>
                            </div>
                            <div class="portfolios-content">
                                <p>{{ $portfolio->space_type_label }} @if($portfolio->area_sft) &bull; {{ $portfolio->area_sft }} sft @endif</p>
                                <h3>
                                    <a href="{{ route('portfolio.show', $portfolio->slug) }}">{{ $portfolio->title }}</a>
                                </h3>
                                <p class="mb-0">
                                    <strong>{{ $portfolio->client_name }}</strong>
                                    @if($portfolio->location) &bull; {{ $portfolio->location }} @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-danger text-center">No portfolio found!</p>
                @endforelse
            </div>

            <div id="data">
                {{ $portfolios->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
