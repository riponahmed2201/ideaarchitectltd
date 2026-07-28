<footer class="ia-footer">
    <div class="ia-footer-main">
        <div class="container">
            <div class="row g-4 g-lg-5">
                {{-- Brand --}}
                <div class="col-lg-4 col-md-6">
                    <div class="ia-footer-brand">
                        <a href="/">
                            <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" alt="{{ site_setting('site_name', 'Idea Architect Limited') }}">
                        </a>
                        <p>
                            At Idea Architects, we transform spaces with innovative design and exceptional craftsmanship.
                            From interior to exterior, we bring your vision to life with meticulous planning and flawless execution.
                        </p>
                        <ul class="ia-footer-social">
                            <li>
                                <a href="https://www.facebook.com/iab2021" target="_blank" rel="noopener" aria-label="Facebook">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@ideaArchitectsLtd-cw6em" target="_blank" rel="noopener" aria-label="YouTube">
                                    <i class="ri-youtube-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                        <a href="https://wa.me/{{ site_setting('whatsapp_number', '8801841275126') }}" target="_blank" rel="noopener" class="ia-footer-whatsapp">
                            <i class="ri-whatsapp-line"></i> Chat on WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="col-lg-2 col-md-6">
                    <h3 class="ia-footer-title">Quick Links</h3>
                    <ul class="ia-footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/portfolio">Portfolio</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                        <li><a href="{{ route('quote.index') }}">Get a Quote</a></li>
                        <li><a href="/contact-us">Contact</a></li>
                    </ul>
                </div>

                {{-- Services --}}
                <div class="col-lg-3 col-md-6">
                    <h3 class="ia-footer-title">Our Services</h3>
                    <ul class="ia-footer-links">
                        <li><a href="/services">All Services</a></li>
                        @foreach (getServiceCategories() as $serviceCategory)
                            <li>
                                <a href="{{ route('services.index', $serviceCategory->slug) }}">{{ $serviceCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Contact --}}
                <div class="col-lg-3 col-md-6">
                    <h3 class="ia-footer-title">Get in Touch</h3>
                    <div class="ia-footer-contact-item">
                        <div class="ia-icon"><i class="flaticon-telephone"></i></div>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:{{ preg_replace('/\s+/', '', site_setting('site_phone_1')) }}">{{ site_setting('site_phone_1') }}</a>
                            @if (site_setting('site_phone_2'))
                                <br><a href="tel:{{ preg_replace('/\s+/', '', site_setting('site_phone_2')) }}">{{ site_setting('site_phone_2') }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="ia-footer-contact-item">
                        <div class="ia-icon"><i class="flaticon-envelope"></i></div>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:{{ site_setting('site_email') }}">{{ site_setting('site_email') }}</a>
                        </div>
                    </div>
                    <div class="ia-footer-contact-item">
                        <div class="ia-icon"><i class="flaticon-placeholder"></i></div>
                        <div>
                            <h4>Office</h4>
                            <p>{{ site_setting('site_address') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="ia-footer-newsletter">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5">
                        <h3>Subscribe to Our Newsletter</h3>
                        <p>Get design tips, project updates, and exclusive offers delivered to your inbox.</p>
                    </div>
                    <div class="col-lg-7">
                        <form id="newsletterForm" class="ia-footer-newsletter-form">
                            @csrf
                            <input type="email" name="email" placeholder="Enter your email address" required>
                            <button type="submit">Subscribe</button>
                        </form>
                        <div id="newsletterMsg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ia-footer-bottom">
        <div class="container">
            <div class="ia-footer-bottom-inner">
                <p>&copy; {{ date('Y') }} {{ site_setting('site_name', 'Idea Architect Limited') }}. All rights reserved.</p>

                <ul class="ia-footer-bottom-links">
                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                    <li><a href="/contact-us">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

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
