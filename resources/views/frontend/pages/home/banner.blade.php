<div class="ia-hero banner-two-area">
    <div class="banner-two-slider owl-carousel owl-theme">
        @foreach ($sliders as $slider)
            <div class="ia-hero-slide" style="background-image: url('{{ Storage::url($slider->image) }}');">
                <div class="ia-hero-overlay"></div>
                <div class="container">
                    <div class="ia-hero-content" data-aos="fade-up" data-aos-duration="800">
                        <span class="ia-label">Welcome to Idea Architects Limited</span>
                        <h1>{{ $slider->title }}</h1>
                        <p>{{ $slider->short_description }}</p>
                        <div class="ia-hero-actions">
                            <a href="/services" class="default-btn">Our Services <i class="flaticon-next"></i></a>
                            <a href="{{ route('portfolio.index') }}" class="ia-btn-outline">View Portfolio <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
