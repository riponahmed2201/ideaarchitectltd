@extends('frontend.layouts.app')

@section('title', 'FAQ - Idea Architect Limited')

@section('content')
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Frequently Asked Questions</h1>
                <p><a href="/">Home</a> FAQ</p>
            </div>
        </div>
    </div>

    <div class="services-details-area pt-100 pb-100">
        <div class="container">
            <div class="accordion" id="faqAccordion">
                @forelse ($faqs as $index => $faq)
                    <div class="card mb-3">
                        <div class="card-header" id="heading{{ $faq->id }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h5>
                        </div>
                        <div id="collapse{{ $faq->id }}" class="collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="card-body">{!! nl2br(e($faq->answer)) !!}</div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No FAQs available yet.</p>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('quote.index') }}" class="default-btn">Book a Consultation <i class="flaticon-next"></i></a>
            </div>
        </div>
    </div>
@endsection
