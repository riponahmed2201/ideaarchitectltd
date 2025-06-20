<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Idea Architect Limited</title>

    <!-- Start Styles -->
    @include('frontend.partials.styles')
    <!-- End Styles -->
</head>

<body>

    <!-- WhatsApp Chat Button -->
    <div class="whatsapp-chat">
        <a href="https://wa.me/8801732691745" target="_blank">
            <div class="chat-box">
                Need Help? <strong>Chat with us</strong>
                <img src="{{ asset('assets/frontend/images/whatsapp.jpg') }}" alt="WhatsApp" />
            </div>
        </a>
    </div>

    <!-- Start Preloader Area -->
    {{-- @include('frontend.partials.preloader') --}}
    <!-- End Preloader Area -->

    <!-- topnav Area -->
    @include('frontend.partials.topnav')
    <!-- End topnav Area -->

    <!-- Start Navbar Area -->
    @include('frontend.partials.navbar')
    <!-- End  Navbar Area -->

    @yield('content')

    <!-- Start footer area -->
    @include('frontend.partials.footer')
    <!-- End footer area -->

    <!-- Start Copyright Area -->
    @include('frontend.partials.copyright')
    <!-- Start Copyright Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-arrow-up-s-line"></i>
        <i class="ri-arrow-up-s-line"></i>
    </div>
    <!-- End Go Top Area -->

    <!-- Start Scripts -->
    @include('frontend.partials.scripts')
    <!-- End Scripts -->

    <!-- include izitoast vendor -->
    @include('vendor.lara-izitoast.toast')

</body>

</html>
