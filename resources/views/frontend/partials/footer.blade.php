<div class="footer-area about-footer pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget">
                    <a href="/">
                        <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" alt="Images">
                    </a>
                    <p>
                        At Idea Architects, we are dedicated to transforming spaces with innovative design and
                        exceptional craftsmanship.
                        Specializing in both interior and exterior design, we bring your vision to life through
                        meticulous planning, creative solutions,
                        and flawless execution.
                    </p>
                    <ul>
                        <li>
                            <a href="http://www.linkedin.com/" target="_blank">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class="ri-pinterest-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget ps-5">
                    <h2>Quick Links</h2>
                    <ul class="footer-list">
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/portfolio">Portfolio</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                        <li><a href="{{ route('quote.index') }}">Get a Quote</a></li>
                        <li><a href="/contact-us">Contact</a></li>
                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget ps-5">
                    <h2>Featured Services</h2>
                    <ul class="footer-list">
                        <li><a target="_blank" href="/services">All Services</a></li>
                        @foreach (getServiceCategories() as $serviceCategory)
                            <li>
                                <a target="_blank"
                                    href="{{ route('services.index', $serviceCategory->slug) }}">{{ $serviceCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget">
                    <h2>Information</h2>
                    <div class="footer-information">
                        <i class="flaticon-telephone"></i>
                        <h3>Phone</h3>
                        <a href="tel:{{ preg_replace('/\s+/', '', site_setting('site_phone_1')) }}">{{ site_setting('site_phone_1') }}</a>
                        @if (site_setting('site_phone_2'))
                            <br><a href="tel:{{ preg_replace('/\s+/', '', site_setting('site_phone_2')) }}">{{ site_setting('site_phone_2') }}</a>
                        @endif
                    </div>
                    <div class="footer-information">
                        <i class="flaticon-envelope"></i>
                        <h3>Email</h3>
                        <a href="mailto:{{ site_setting('site_email') }}">{{ site_setting('site_email') }}</a>
                    </div>
                    <div class="footer-information">
                        <i class="flaticon-placeholder"></i>
                        <h3>Address</h3>
                        <p>{{ site_setting('site_address') }}</p>
                    </div>

                    <div class="footer-information mt-4">
                        <h3>Newsletter</h3>
                        <form id="newsletterForm" class="mt-2">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Your email" required>
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </div>
                            <div id="newsletterMsg" class="mt-2 small"></div>
                        </form>
                    </div>

                    <div class="footer-information mt-3">
                        <h3>Language</h3>
                        <a href="{{ route('locale.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'fw-bold' : '' }}">English</a>
                        |
                        <a href="{{ route('locale.switch', 'bn') }}" class="{{ app()->getLocale() === 'bn' ? 'fw-bold' : '' }}">বাংলা</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$('#newsletterForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '{{ route('newsletter.subscribe') }}',
        data: $(this).serialize(),
        success: function(res) {
            $('#newsletterForm')[0].reset();
            $('#newsletterMsg').removeClass('text-danger').addClass('text-success').text(res.message);
        },
        error: function(xhr) {
            const msg = xhr.responseJSON?.errors?.email?.[0] || xhr.responseJSON?.message || 'Something went wrong.';
            $('#newsletterMsg').removeClass('text-success').addClass('text-danger').text(msg);
        }
    });
});
</script>
@endpush
