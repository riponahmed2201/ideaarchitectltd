@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Quote Request Details'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Quote Requests', 'url' => route('admin.quote-requests.index')],
        ['label' => 'Details', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Request from {{ $quoteRequest->name }}</h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.quote-requests.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6"><strong>Name:</strong> {{ $quoteRequest->name }}</div>
                        <div class="col-md-6"><strong>Email:</strong> {{ $quoteRequest->email }}</div>
                        <div class="col-md-6 mt-3"><strong>Phone:</strong> {{ $quoteRequest->phone }}</div>
                        <div class="col-md-6 mt-3"><strong>Service Type:</strong> {{ $quoteRequest->service_type ?? '—' }}</div>
                        <div class="col-md-6 mt-3"><strong>Budget:</strong> {{ $quoteRequest->budget ?? '—' }}</div>
                        <div class="col-md-6 mt-3"><strong>Preferred Date:</strong> {{ $quoteRequest->preferred_date?->format('M d, Y') ?? '—' }}</div>
                        <div class="col-md-6 mt-3"><strong>Received:</strong> {{ $quoteRequest->created_at->format('M d, Y h:i A') }}</div>
                    </div>
                    @if ($quoteRequest->message)
                        <div class="mb-3"><strong>Project Details:</strong></div>
                        <div class="p-5 bg-light rounded">{{ $quoteRequest->message }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
