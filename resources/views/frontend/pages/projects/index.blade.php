@extends('frontend.layouts.app')

@section('title', 'Our Projects - Idea Architect Limited')

@section('content')
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Our Projects</h1>
                <p><a href="/">Home</a> Projects</p>
            </div>
        </div>
    </div>

    <div class="our-portfolio-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">EXPLORE OUR PROJECTS</span>
                <h2>Running & Finished Projects</h2>
            </div>
            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolios-item portfolios-image">
                            <a href="{{ route('projects.show', $project->id) }}">
                                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}">
                            </a>
                            <div class="portfolios-content">
                                <p>{{ ucfirst($project->type) }} &bull; {{ $project->location }}</p>
                                <h3>
                                    <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-danger text-center">No Projects Found!</p>
                @endforelse
            </div>
            <div id="data">
                {{ $projects->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
