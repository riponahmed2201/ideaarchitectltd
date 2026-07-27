<div class="our-portfolio-area pt-100 pb-70">
    <div class="container">
        <div class="provided-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span class="top-title">FEATURED WORK</span>
                        <h2>Our Latest Portfolio</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="button text-lg-end">
                        <a href="{{ route('portfolio.index') }}" class="default-btn">View All Portfolio<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($featuredPortfolios as $portfolio)
                <div class="col-lg-4 col-md-6">
                    <div class="portfolios-item portfolios-image">
                        <a href="{{ route('portfolio.show', $portfolio->slug) }}">
                            <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}">
                        </a>
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
                <p class="text-center text-muted">Portfolio items coming soon.</p>
            @endforelse
        </div>
    </div>
</div>
