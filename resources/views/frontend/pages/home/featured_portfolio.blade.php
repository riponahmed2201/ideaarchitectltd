<section class="ia-portfolio">
    <div class="container">
        <div class="ia-section-top">
            <div class="ia-section-head">
                <span class="ia-label">Featured Work</span>
                <h2>Our Latest Portfolio</h2>
            </div>
            <a href="{{ route('portfolio.index') }}" class="default-btn">View All Portfolio <i class="flaticon-next"></i></a>
        </div>
        <div class="row justify-content-center g-4">
            @forelse ($featuredPortfolios as $portfolio)
                <div class="col-lg-4 col-md-6">
                    <div class="ia-portfolio-card">
                        <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="d-block position-relative">
                            <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}">
                            <div class="ia-portfolio-overlay"></div>
                            <div class="ia-portfolio-body">
                                <span class="ia-tag">
                                    {{ $portfolio->space_type_label }}
                                    @if ($portfolio->area_sft) &bull; {{ $portfolio->area_sft }} sft @endif
                                </span>
                                <h3>{{ $portfolio->title }}</h3>
                                <p class="ia-meta">
                                    <strong>{{ $portfolio->client_name }}</strong>
                                    @if ($portfolio->location) &bull; {{ $portfolio->location }} @endif
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Portfolio items coming soon.</p>
            @endforelse
        </div>
    </div>
</section>
