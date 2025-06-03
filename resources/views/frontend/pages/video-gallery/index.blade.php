@extends('frontend.layouts.app')

@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Our Video Gallery</h1>
                <p><a href="/">Home</a>Video Gallery</p>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- our news articles -->
    <div class="articles-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @forelse ($videos as $video)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="ratio ratio-16x9">
                            <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $video->url }}"
                                title="{{ $video->title }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-danger">No Blog Found!</p>
                @endforelse
            </div>

            <!-- Display pagination links -->
            <div id="data">
                {{ $videos->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
    <!-- End our news articles -->
@endsection
