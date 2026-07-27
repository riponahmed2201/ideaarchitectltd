@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Newsletter Subscribers'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Newsletter', 'active' => true]]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Subscribers ({{ $subscribers->total() }})</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-row-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Subscribed At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $subscriber->id }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->subscribed_at?->format('M d, Y h:i A') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.newsletter-subscribers.destroy', $subscriber) }}">Remove</button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted">No subscribers yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $subscribers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).on('click', '.delete-btn', function() {
    if (!confirm('Remove this subscriber?')) return;
    $.ajax({ url: $(this).data('url'), type: 'DELETE', data: { _token: '{{ csrf_token() }}' }, success: () => location.reload() });
});
</script>
@endpush
