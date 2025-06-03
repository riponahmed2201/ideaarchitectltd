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
                        exceptional
                        craftsmanship.
                        Specializing in both interior and exterior design, we bring your vision to life through
                        meticulous
                        planning, creative solutions,
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
                        <li>
                            <a href="/about-us">About Us</a>
                        </li>
                        <li>
                            <a href="/portfolio">Portfolio</a>
                        </li>
                        <li>
                            <a href="/services">Services</a>
                        </li>
                        <li>
                            <a href="/blog">Blog</a>
                        </li>
                        <li>
                            <a href="/contact-us">Contact</a>
                        </li>
                        <li>
                            <a href="/privacy-policy">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget ps-5">
                    <h2>Featured Services</h2>
                    <ul class="footer-list">
                        <li>
                            <a target="_blank" href="/services">All Services</a>
                        </li>
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
                        <a href="tel:+8801732-691745">+8801732-691745</a>
                    </div>
                    <div class="footer-information">
                        <i class="flaticon-envelope"></i>
                        <h3>Email</h3>
                        <a href="#">
                            <span>
                                idea.architectsbd@gmail.com
                            </span>
                        </a>
                    </div>
                    <div class="footer-information">
                        <i class="flaticon-placeholder"></i>
                        <h3>Address</h3>
                        <p>Mirpur - 6, Dhaka-1216, Bangladesh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
