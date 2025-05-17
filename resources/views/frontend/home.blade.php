@extends('frontend.layouts.app')

@section('content')
    <!-- Start Banner Three Area -->
    @include('frontend.pages.home.banner')
    <!-- End Banner Three Area -->

    <!-- Start working process -->
    @include('frontend.pages.home.working_process')
    <!-- End working process -->

    <!-- Start About Three Area -->
    @include('frontend.pages.home.about')
    <!-- End About Three Area -->

    <!-- our best services -->
    @include('frontend.pages.home.services')
    <!-- End our best services -->

    <!-- why choose us three -->
    @include('frontend.pages.home.choose')
    <!-- End why choose us three -->

    <!-- Start Client Success Stories -->
    @include('frontend.pages.home.client_success_stories')
    <!-- End Client Success Stories -->

    <!-- Start counter area -->
    @include('frontend.pages.home.counter')
    <!-- End counter area -->

    <!-- partners area -->
    @include('frontend.pages.home.partner')
    <!-- End partners area -->
@endsection
