@extends('admin.layouts.app')

@push('styles')
    @include('admin.layouts.partials.datatable-styles')
@endpush

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit Partner' : 'Add Partner'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Partners', 'url' => route('admin.partners.index')],
        ['label' => isset($editModeData) ? 'Edit Partner' : 'Add Partner', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"></div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.partners.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-check"></i> Blog List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.partners.update', $editModeData->id) : route('admin.partners.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($editModeData)
                            @method('PUT')
                        @endisset

                        <div class="row mb-5">
                            <!-- Name -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Name</label>
                                <input type="text" name="name" required
                                    class="form-control form-control-solid @error('name') is-invalid @enderror"
                                    placeholder="Enter name" value="{{ old('name', $editModeData->name ?? '') }}" />
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Logo -->
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

                            <!-- Status -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Status</label>
                                <select name="status" required
                                    class="form-select form-select-solid @error('status') is-invalid @enderror"
                                    data-control="select2" data-placeholder="Select Status">
                                    <option value="" disabled {{ !isset($editModeData) ? 'selected' : '' }}>Select
                                        Status</option>
                                    <option value="1" @selected(old('status', $editModeData->status ?? '') == 1)>Active</option>
                                    <option value="0" @selected(old('status', $editModeData->status ?? '') == 0)>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Description</label>
                                <textarea name="description" class="form-control form-control-solid @error('description') is-invalid @enderror"
                                    placeholder="Enter description" data-kt-autosize="true">{{ old('description', $editModeData->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer flex-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">{{ isset($editModeData) ? 'Update' : 'Submit' }}</span>
                            </button>
                        </div>
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
