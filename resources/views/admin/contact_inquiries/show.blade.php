@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Inquiry Details'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Contact Inquiries', 'url' => route('admin.contact-inquiries.index')],
        ['label' => 'Details', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="fw-bolder">Message from {{ $contactInquiry->name }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.contact-inquiries.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6"><strong>Name:</strong> {{ $contactInquiry->name }}</div>
                        <div class="col-md-6"><strong>Email:</strong> {{ $contactInquiry->email }}</div>
                        <div class="col-md-6 mt-3"><strong>Phone:</strong> {{ $contactInquiry->phone }}</div>
                        <div class="col-md-6 mt-3"><strong>Received:</strong> {{ $contactInquiry->created_at->format('M d, Y h:i A') }}</div>
                    </div>
                    <div class="mb-3"><strong>Message:</strong></div>
                    <div class="p-5 bg-light rounded">{{ $contactInquiry->message }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
