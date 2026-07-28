@if (isset($testimonials) && $testimonials->count())
    <section class="ia-testimonials">
        <div class="container">
            <div class="ia-section-head ia-section-head--center">
                <span class="ia-label">Client Reviews</span>
                <h2>What Our Clients Say</h2>
            </div>
            <div class="ia-testimonials-slider owl-carousel owl-theme">
                @foreach ($testimonials as $testimonial)
                    <div class="ia-testimonial-slide">
                        <div class="ia-testimonial-card">
                            <div class="ia-quote-icon">"</div>
                            <p class="ia-testimonial-quote">{{ $testimonial->quote }}</p>
                            <div class="ia-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill" style="color:{{ $i <= $testimonial->rating ? '#f5a623' : '#ddd' }}"></i>
                                @endfor
                            </div>
                            <div class="ia-testimonial-footer">
                                @if ($testimonial->image)
                                    <img src="{{ Storage::url($testimonial->image) }}" alt="{{ $testimonial->client_name }}" class="ia-testimonial-avatar">
                                @endif
                                <div class="ia-testimonial-meta">
                                    <h5>{{ $testimonial->client_name }}</h5>
                                    <p class="ia-role">{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
