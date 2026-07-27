@extends('admin.layouts.app')

@push('styles')
    @include('admin.layouts.partials.datatable-styles')
@endpush

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit Client Logo' : 'Add Client Logo'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Clients', 'url' => route('admin.clients.index')],
        ['label' => isset($editModeData) ? 'Edit Client Logo' : 'Add Client Logo', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-toolbar">
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-primary">
                            <i class="bi bi-list-check"></i> Client List
                        </a>
                    </div>
                </div>
                <div class="card-body py-4">
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.clients.update', $editModeData->id) : route('admin.clients.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($editModeData)
                            @method('PUT')
                        @endisset

                        <div class="row mb-5">
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Client / Company Name</label>
                                <input type="text" name="name" required
                                    class="form-control form-control-solid @error('name') is-invalid @enderror"
                                    placeholder="Enter client or company name"
                                    value="{{ old('name', $editModeData->name ?? '') }}" />
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Logo</label>
                                <input type="file" name="logo" id="imageInput"
                                    class="form-control form-control-solid @error('logo') is-invalid @enderror" />
                                <div class="mt-2">
                                    <img id="imagePreview"
                                        src="{{ isset($editModeData) && $editModeData->logo ? asset('storage/' . $editModeData->logo) : '#' }}"
                                        alt="Preview"
                                        style="max-height: 100px; {{ isset($editModeData->logo) ? '' : 'display:none;' }}">
                                </div>
                                @error('logo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Status</label>
                                <select name="status" required
                                    class="form-select form-select-solid @error('status') is-invalid @enderror">
                                    <option value="1" @selected(old('status', $editModeData->status ?? 1) == 1)>Active</option>
                                    <option value="0" @selected(old('status', $editModeData->status ?? 1) == 0)>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Description</label>
                                <textarea name="description" class="form-control form-control-solid @error('description') is-invalid @enderror"
                                    placeholder="Enter description">{{ old('description', $editModeData->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($editModeData) ? 'Update' : 'Submit' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#imageInput').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
