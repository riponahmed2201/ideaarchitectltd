@extends('frontend.layouts.app')

@section('body_class', 'ia-page-home')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/home-modern.css') }}">
@endpush

@section('content')
    <div class="ia-home">
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
    </div>
@endsection
