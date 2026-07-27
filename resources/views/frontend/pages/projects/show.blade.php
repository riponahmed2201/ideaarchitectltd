@extends('frontend.layouts.app')

@section('title', $project->title . ' - Idea Architect Limited')

@section('content')
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Project Details</h1>
                <p><a href="/">Home</a> <a href="{{ route('projects.index') }}">Projects</a></p>
            </div>
        </div>
    </div>

    <div class="corporate-website-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="corporate-image">
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="corporate-website-content">
                        <h2>{{ $project->title }}</h2>
                        <div>
                            {!! html_entity_decode($project->description) !!}
                        </div>
                        <ul>
                            <li><i class="flaticon-tag"></i><span>Type:</span> {{ ucfirst($project->type) }}</li>
                            <li><i class="flaticon-placeholder"></i><span>Location:</span> {{ $project->location }}</li>
                            <li><i class="flaticon-settings"></i><span>Area:</span> {{ $project->area_sft }} sft</li>
                            <li><i class="flaticon-calendar-1"></i><span>Date:</span> {{ $project->date }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($relatedProjects->count())
        <div class="our-portfolio-area pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Related Projects</h2>
                </div>
                <div class="row">
                    @foreach ($relatedProjects as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="portfolios-item portfolios-image">
                                <a href="{{ route('projects.show', $item->id) }}">
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
                                </a>
                                <div class="portfolios-content">
                                    <p>{{ ucfirst($item->type) }}</p>
                                    <h3>
                                        <a href="{{ route('projects.show', $item->id) }}">{{ $item->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
