{{-- <div class="our-best-services-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span class="top-title">SERVICES WE PROVIDED</span>
            <h2>Our Best Services</h2>
        </div>
        <div class="our-best-services-slider owl-carousel owl-theme">
            @foreach ($serviceCategories as $serviceCategory)
                <div class="best-services-card">
                    <i class="flaticon-analysis"></i>
                    <i class="flaticon-analysis best-icon"></i>
                    <h3>
                        <a href="#">{{ $serviceCategory->name }}</a>
                    </h3>
                    <div>
                        {{ $serviceCategory->description }}
                    </div>
                    <div class="read-more">
                        <a href="#">Read More <i class="flaticon-next"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="services-btn">
            <a href="/services" class="default-btn">All Services <i class="flaticon-next"></i></a>
        </div>
    </div>
</div> --}}

<div class="services-area pt-100 pb-100">
    <div class="container-fluid">
        <div class="provided-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-8 col-md-8">
                    <div class="section-title-left">
                        <span>SERVICES WE PROVIDED</span>
                        <h2>Our Best Services</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-md-4">
                    <div class="button">
                        <a href="/services" class="default-btn">All Services <i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-slider owl-carousel owl-theme">
            @foreach ($services as $service)
                @php
                    $serviceDetailsRoute = route('services.show', [
                        'category_slug' => $service->category->slug,
                        'service_slug' => $service->slug,
                    ]);
                @endphp
                <div class="services-slider-content">
                    <div class="services-slider-img">
                        <a href="{{ $serviceDetailsRoute }}">
                            <img src="{{ Storage::url($service->image) }}" alt="Images">
                        </a>
                    </div>
                    <div class="single-feature-card">
                        <h3>
                            <a href="{{ $serviceDetailsRoute }}">{{ $service->name }}</a>
                        </h3>
                        <p>
                            {{ $service->short_description }}
                        </p>
                        <div class="feature-btn">
                            <a href="{{ $serviceDetailsRoute }}">
                                <i class="flaticon-next"></i>
                            </a>
                        </div>
                        <div class="feature-shape-2">
                            <img src="{{ asset('assets/frontend/images/feature-shape-1.png') }}" alt="images">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
