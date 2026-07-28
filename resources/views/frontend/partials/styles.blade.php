{{-- <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}" /> --}}
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/logo/logo.png') }}" />

<!-- Link off css Fill -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/fancybox.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/meanmenu.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/odometer.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/remixicon.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/dark.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/header-modern.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/footer-modern.css') }}" />

<!-- izitoast CSS -->
<link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">


<style>
    .whatsapp-chat {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }

    .chat-box {
        display: flex;
        align-items: center;
        background-color: #ffffff;
        border-radius: 25px;
        padding: 10px 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #000;
        transition: box-shadow 0.3s;
    }

    .chat-box img {
        width: 38px;
        height: 38px;
        margin-left: 10px;
    }

    .theme-dark .whatsapp-chat .chat-box {
        background-color: #1c1c2c;
        color: #e2e8f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    }
</style>

@stack('style')
