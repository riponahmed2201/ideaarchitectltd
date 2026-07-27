@if(isset($testimonials) && $testimonials->count())
<div class="testimonials-area pt-100 pb-70" style="background:#f9f9f9;">
    <div class="container">
        <div class="section-title center-title">
            <span class="top-title">CLIENT REVIEWS</span>
            <h2>What Our Clients Say</h2>
        </div>
        <div class="row">
            @foreach ($testimonials as $testimonial)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="p-4 bg-white h-100" style="border-radius:8px; box-shadow:0 2px 15px rgba(0,0,0,.06);">
                        <p class="mb-3">"{{ $testimonial->quote }}"</p>
                        <h5 class="mb-1">{{ $testimonial->client_name }}</h5>
                        <p class="text-muted mb-2">{{ $testimonial->designation }}</p>
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="ri-star-fill" style="color:{{ $i <= $testimonial->rating ? '#f5a623' : '#ddd' }}"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
