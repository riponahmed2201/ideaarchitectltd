@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Testimonials'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Testimonials', 'active' => true]]" />
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header"><a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add Testimonial</a></div>
                <div class="card-body table-responsive">
                    <table class="table table-row-bordered">
                        <thead><tr><th>Client</th><th>Designation</th><th>Rating</th><th>Status</th><th>Action</th></tr></thead>
                        <tbody>
                            @foreach ($testimonials as $item)
                                <tr>
                                    <td>{{ $item->client_name }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->rating }}/5</td>
                                    <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.testimonials.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.testimonials.destroy', $item) }}">Delete</button>
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
<script>$(document).on('click', '.delete-btn', function() { if (!confirm('Delete?')) return; $.ajax({ url: $(this).data('url'), type: 'DELETE', data: { _token: '{{ csrf_token() }}' }, success: () => location.reload() }); });</script>
@endpush
