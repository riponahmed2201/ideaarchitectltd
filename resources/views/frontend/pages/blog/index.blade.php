@extends('frontend.layouts.app')

@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Our Blog</h1>
                <p><a href="/">Home</a>Blog</p>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- our news articles -->
    <div class="articles-area pt-100 pb-70">
        <div class="container">
            {{-- <div class="section-title center-title">
                <span class="top-title">OUR NEWS & ARTICLES</span>
                <h2>Latest News From Blog</h2>
            </div> --}}
            <div class="row">
                @forelse ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="articles-content">
                            <div class="blog-image">
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    <img src="{{ Storage::url($blog->featured_image) }}" alt="Images">
                                </a>
                            </div>
                            <div class="articles-text">
                                <div class="latest-blog">
                                    <i class="flaticon-calendar"></i>
                                    <span>{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                                </div>
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                <p>{{ $blog->short_description }}</p>
                                <div class="blog-btn-two">
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        <i class="flaticon-next"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-shape">
                                <img src="{{ asset('assets/frontend/images/blog/latest-blog-shape.png') }}" alt="Images">
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-danger">No Blog Found!</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- End our news articles -->
@endsection
