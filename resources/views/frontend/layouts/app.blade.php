<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @php
        $pageTitle = trim($__env->yieldContent('title')) ?: site_setting('site_name', 'Idea Architect Limited');
        $pageDescription = trim($__env->yieldContent('meta_description')) ?: 'Idea Architect Limited - Architecture, Interior Design & Construction services in Dhaka, Bangladesh.';
        $pageKeywords = trim($__env->yieldContent('meta_keywords')) ?: 'architecture, interior design, construction, RAJUK approval, Dhaka, Bangladesh';
        $pageImage = trim($__env->yieldContent('meta_image')) ?: asset('assets/logo/logo.png');
    @endphp
    <meta name="description" content="{{ $pageDescription }}" />
    <meta name="keywords" content="{{ $pageKeywords }}" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $pageTitle }}" />
    <meta property="og:description" content="{{ $pageDescription }}" />
    <meta property="og:image" content="{{ $pageImage }}" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $pageTitle }}" />
    <meta name="twitter:description" content="{{ $pageDescription }}" />

    <title>{{ $pageTitle }}</title>

    @if ($gaId = site_setting('google_analytics_id'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
        <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{{ $gaId }}');</script>
    @endif

    @if ($pixelId = site_setting('meta_pixel_id'))
        <script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','{{ $pixelId }}');fbq('track','PageView');</script>
    @endif

    @include('frontend.partials.styles')
</head>

<body class="@yield('body_class')">
    <div class="whatsapp-chat">
        <a href="https://wa.me/{{ site_setting('whatsapp_number', '8801841275126') }}" target="_blank">
            <div class="chat-box">
                Need Help? <strong>Chat with us</strong>
                <img src="{{ asset('assets/frontend/images/whatsapp.jpg') }}" alt="WhatsApp" />
            </div>
        </a>
    </div>

    <header class="ia-site-header">
        @include('frontend.partials.topnav')
        @include('frontend.partials.navbar')
    </header>

    @yield('content')

    @include('frontend.partials.footer')
    @include('frontend.partials.copyright')

    <div class="go-top"><i class="ri-arrow-up-s-line"></i><i class="ri-arrow-up-s-line"></i></div>

    @include('frontend.partials.scripts')
    @include('vendor.lara-izitoast.toast')
</body>
</html>
