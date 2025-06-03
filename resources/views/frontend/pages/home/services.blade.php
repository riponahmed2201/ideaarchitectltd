<!-- Start Services Two area -->
<div class="services-item pt-100 pb-70">
    <div class="container">
        <div class="provided-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span class="top-title">SERVICES WE PROVIDED</span>
                        <h2>Our Best Services</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="button">
                        <a href="/services" class="default-btn">All Services<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($serviceCategories as $serviceCategory)
                <div class="col-lg-4 col-md-6">
                    <div class="services-card">
                        <i class="flaticon-analysis analysis-icon-two"></i>
                        <h2>
                            <a
                                href="{{ route('services.index', $serviceCategory->slug) }}">{{ $serviceCategory->name }}</a>
                        </h2>
                        <p>
                            {{ $serviceCategory->description }}
                        </p>
                        <div class="read-more">
                            <a href="{{ route('services.index', $serviceCategory->slug) }}">View More<i
                                    class="flaticon-next"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Services Two area -->
