@extends('frontend.layouts.app')

@section('title', 'Get a Quote - Idea Architect Limited')

@section('content')
    <div class="page-banner-area">
        <div class="container-fluid">
            <div class="page-banner-content">
                <h1>Book a Consultation</h1>
                <p><a href="/">Home</a> Get a Quote</p>
            </div>
        </div>
    </div>

    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-group-from">
                        <div class="section-title left-title mb-4">
                            <span class="top-title">FREE CONSULTATION</span>
                            <h2>Tell Us About Your Project</h2>
                        </div>
                        <form id="quoteForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3"><input type="text" name="name" class="form-control" placeholder="Your Name*" required></div>
                                <div class="col-md-6 mb-3"><input type="email" name="email" class="form-control" placeholder="Email*" required></div>
                                <div class="col-md-6 mb-3"><input type="text" name="phone" class="form-control" placeholder="Phone*" required></div>
                                <div class="col-md-6 mb-3">
                                    <select name="service_type" class="form-control">
                                        <option value="">Select Service Type</option>
                                        @foreach ($serviceCategories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3"><input type="text" name="budget" class="form-control" placeholder="Estimated Budget"></div>
                                <div class="col-md-6 mb-3"><input type="date" name="preferred_date" class="form-control"></div>
                                <div class="col-12 mb-3"><textarea name="message" class="form-control" rows="4" placeholder="Project details"></textarea></div>
                                <div class="col-12">
                                    <button type="submit" class="default-btn">Submit Request</button>
                                    <div id="quoteMsgSubmit" class="mt-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$('#quoteForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '{{ route('quote.store') }}',
        data: $(this).serialize(),
        success: function(res) {
            $('#quoteForm')[0].reset();
            $('#quoteMsgSubmit').removeClass('text-danger').addClass('text-success').text(res.message);
        },
        error: function(xhr) {
            $('#quoteMsgSubmit').removeClass('text-success').addClass('text-danger').text(xhr.responseJSON?.message || 'Something went wrong.');
        }
    });
});
</script>
@endpush
