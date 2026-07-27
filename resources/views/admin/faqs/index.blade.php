@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'FAQs'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'FAQs', 'active' => true]]" />
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header"><a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Add FAQ</a></div>
                <div class="card-body table-responsive">
                    <table class="table table-row-bordered">
                        <thead><tr><th>#</th><th>Question</th><th>Order</th><th>Status</th><th>Action</th></tr></thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->id }}</td>
                                    <td>{{ Str::limit($faq->question, 80) }}</td>
                                    <td>{{ $faq->sort_order }}</td>
                                    <td>{{ $faq->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.faqs.destroy', $faq) }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).on('click', '.delete-btn', function() {
    if (!confirm('Delete this item?')) return;
    $.ajax({ url: $(this).data('url'), type: 'DELETE', data: { _token: '{{ csrf_token() }}' }, success: () => location.reload() });
});
</script>
@endpush
