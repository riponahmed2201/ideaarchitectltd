<!-- Canonical URL -->
<link rel="canonical" href="https://ideaarchitectsltd.com" />

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/admin/media/logos/favicon.ico') }}" />

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->

<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

<!-- izitoast CSS -->
<link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

<!-- Page Specific CSS -->
@stack('styles')
