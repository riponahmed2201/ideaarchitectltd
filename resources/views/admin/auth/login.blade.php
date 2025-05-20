<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../">

    <meta charset="utf-8" />
    <meta name="description"
        content="Idea Architects Limited specializes in innovative interior and exterior design solutions. Transform your space with our expert architectural, renovation, and decor services." />
    <meta name="keywords"
        content="Idea Architects Limited, Interior Design, Exterior Design, Architecture Firm, Home Renovation, Office Design, Landscape Design, Building Design, Interior Decor, Architecture Services" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Open Graph Meta Tags for Social Sharing -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Idea Architects Limited – Interior & Exterior Design Experts" />
    <meta property="og:description"
        content="Elevate your spaces with Idea Architects Limited. We offer modern and functional interior and exterior design services for homes, offices, and commercial spaces." />
    <meta property="og:url" content="https://ideaarchitectsltd.com" />
    <meta property="og:site_name" content="Idea Architects Limited" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="../../demo1/dist/index.html" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/admin/media/logos/logo-1.svg') }}" class="h-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" action="{{ route('login') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to Idea Architects Limited</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="javascript:void(0)" class="link-primary fw-bolder">Create an Account</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 fw-bolder text-dark">Email</label>
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                type="email" placeholder="Enter your email" name="email" autocomplete="off"
                                value="{{ old('email') }}" />
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="required form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <a href="javascript:void(0)" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                            </div>
                            <input
                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                type="password" name="password" autocomplete="off" placeholder="Enter your password" />
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">About</a>
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/admin/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
