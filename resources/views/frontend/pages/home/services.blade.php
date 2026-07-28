<section class="ia-services">
    <div class="container">
        <div class="ia-section-top">
            <div class="ia-section-head">
                <span class="ia-label">Services We Provided</span>
                <h2>Our Best Services</h2>
            </div>
            <a href="/services" class="default-btn">All Services <i class="flaticon-next"></i></a>
        </div>
        <div class="ia-services-scroll-wrap">
            <div class="ia-services-grid">
                @foreach ($serviceCategories as $serviceCategory)
                    <div class="ia-services-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="ia-service-card">
                            <div class="ia-icon">
                                <i class="flaticon-analysis"></i>
                            </div>
                            <h3>
                                <a href="{{ route('services.index', $serviceCategory->slug) }}">{{ $serviceCategory->name }}</a>
                            </h3>
                            <p>{{ $serviceCategory->description }}</p>
                            <a href="{{ route('services.index', $serviceCategory->slug) }}" class="ia-link">
                                View More <i class="flaticon-next"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
