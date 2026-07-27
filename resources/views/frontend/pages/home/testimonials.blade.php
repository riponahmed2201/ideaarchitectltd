@if (isset($testimonials) && $testimonials->count())
    <section class="ia-testimonials">
        <div class="container">
            <div class="ia-section-head ia-section-head--center">
                <span class="ia-label">Client Reviews</span>
                <h2>What Our Clients Say</h2>
            </div>
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="ia-testimonial-card">
                            <div class="ia-quote-icon">"</div>
                            <p>{{ $testimonial->quote }}</p>
                            <h5>{{ $testimonial->client_name }}</h5>
                            <p class="ia-role">{{ $testimonial->designation }}</p>
                            <div class="ia-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill" style="color:{{ $i <= $testimonial->rating ? '#f5a623' : '#ddd' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
