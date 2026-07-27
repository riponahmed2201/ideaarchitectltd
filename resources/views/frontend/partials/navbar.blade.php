<div class="navbar-area">
    <div class="container d-lg-none">
        <div class="mobile-nav">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="black-logo" alt="Idea Architects" />
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="white-logo" alt="Idea Architects" />
                </a>
            </div>
        </div>
    </div>

    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light ia-navbar">
                <a class="navbar-brand ia-brand" href="/">
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="black-logo" alt="Idea Architects" />
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="white-logo" alt="Idea Architects" />
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/about-us" class="nav-link {{ Request::is('about-us') ? 'active' : '' }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="/portfolio" class="nav-link {{ Request::is('portfolio*') ? 'active' : '' }}">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">Services</a>
                            <ul class="dropdown-menu">
                                @foreach (getServiceCategories() as $serviceCategory)
                                    <li class="nav-item">
                                        <a href="{{ route('services.index', $serviceCategory->slug) }}" class="nav-link">
                                            {{ $serviceCategory->name }} ({{ $serviceCategory->services_count }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/video-gallery" class="nav-link {{ Request::is('video-gallery*') ? 'active' : '' }}">Video Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a href="/about-us#clients" class="nav-link">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog" class="nav-link {{ Request::is('blog*') ? 'active' : '' }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faq.index') }}" class="nav-link {{ Request::is('faq') ? 'active' : '' }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact-us" class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}">Contact</a>
                        </li>
                        <li class="nav-item d-lg-none mt-3">
                            <a href="{{ route('quote.index') }}" class="default-btn w-100 text-center">Get a Quote <i class="flaticon-next"></i></a>
                        </li>
                    </ul>

                    <div class="option-item d-none d-lg-block">
                        <a href="{{ route('quote.index') }}" class="default-btn">Get a Quote <i class="flaticon-next"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
