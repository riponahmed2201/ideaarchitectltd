@extends('frontend.layouts.app')

@section('content')
    @include('frontend.pages.home.banner')
    @include('frontend.pages.home.services')
    @include('frontend.pages.home.featured_portfolio')
    @include('frontend.pages.home.counter')
    @include('frontend.pages.home.testimonials')
    @include('frontend.pages.home.working_process')
    @include('frontend.pages.home.clients')
    @include('frontend.pages.home.team')
    @include('frontend.pages.home.choose')
    @include('frontend.pages.home.cta')
@endsection
