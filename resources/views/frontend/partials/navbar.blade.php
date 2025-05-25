<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="container">
        <div class="mobile-nav">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="black-logo"
                        alt="Images" />
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="white-logo"
                        alt="images" />
                </a>
            </div>
        </div>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a href="/">
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="black-logo"
                        alt="Logo" />
                    <img src="{{ asset('assets/frontend/images/idea_architects_logo.png') }}" class="white-logo"
                        alt="images" />
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Work Process</a>
                        </li>

                        <li class="nav-item">
                            <a href="/about-us" class="nav-link {{ Request::is('about-us') ? 'active' : '' }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a href="/portfolio"
                                class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}">Portfolio</a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">Services</a>
                            <ul class="dropdown-menu">
                                @foreach (getServiceCategories() as $serviceCategory)
                                    <li class="nav-item">
                                        <a href="{{ route('services.index', $serviceCategory->slug) }}"
                                            class="nav-link">{{ $serviceCategory->name }}
                                            ({{ $serviceCategory->services_count }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="/blog" class="nav-link {{ Request::is('blog*') ? 'active' : '' }}">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a href="/contact-us"
                                class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>

                    <div class="option-item">
                        <a href="#" class="default-btn">Get in Touch<i class="flaticon-next"></i></a>
                    </div>
                </div>
        </div>
        </nav>
    </div>
</div>
