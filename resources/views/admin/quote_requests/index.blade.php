@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Quote Requests'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Quote Requests', 'active' => true]]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-row-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Received</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quotes as $quote)
                                <tr>
                                    <td>{{ $quote->id }}</td>
                                    <td>{{ $quote->name }}</td>
                                    <td>{{ $quote->email }}</td>
                                    <td>{{ $quote->phone }}</td>
                                    <td>{{ $quote->service_type ?? '—' }}</td>
                                    <td>
                                        @if ($quote->is_read)
                                            <span class="badge badge-light-success">Read</span>
                                        @else
                                            <span class="badge badge-light-warning">New</span>
                                        @endif
                                    </td>
                                    <td>{{ $quote->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.quote-requests.show', $quote) }}" class="btn btn-sm btn-primary">View</a>
                                        <button class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.quote-requests.destroy', $quote) }}">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="8" class="text-center text-muted">No quote requests yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $quotes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).on('click', '.delete-btn', function() {
    if (!confirm('Delete this quote request?')) return;
    $.ajax({ url: $(this).data('url'), type: 'DELETE', data: { _token: '{{ csrf_token() }}' }, success: () => location.reload() });
});
</script>
@endpush
