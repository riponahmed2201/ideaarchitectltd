@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit Portfolio' : 'Add Portfolio'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Portfolios', 'url' => route('admin.portfolios.index')],
        ['label' => isset($editModeData) ? 'Edit Portfolio' : 'Add Portfolio', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-check"></i>
                                Portfolio List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.portfolios.update', $editModeData->id) : route('admin.portfolios.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($editModeData)
                            @method('PUT')
                        @endisset

                        <div class="row mb-5">

                            <!-- Service -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Service</label>
                                <select name="service_id" required
                                    class="form-select form-select-solid @error('service_id') is-invalid @enderror"
                                    data-control="select2" data-placeholder="Select Service">
                                    <option value="">Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" @selected(old('service_id', $editModeData->service_id ?? '') == $service->id)>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Title -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Title</label>
                                <input type="text" name="title" required
                                    class="form-control form-control-solid @error('title') is-invalid @enderror"
                                    placeholder="Enter title" value="{{ old('title', $editModeData->title ?? '') }}" />
                                @error('title')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Client Name -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Client Name</label>
                                <input type="text" name="client_name" required
                                    class="form-control form-control-solid @error('client_name') is-invalid @enderror"
                                    placeholder="Enter client name"
                                    value="{{ old('client_name', $editModeData->client_name ?? '') }}" />
                                @error('client_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Area -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Area (sft)</label>
                                <input type="text" name="area_sft"
                                    class="form-control form-control-solid @error('area_sft') is-invalid @enderror"
                                    placeholder="e.g. 3200"
                                    value="{{ old('area_sft', $editModeData->area_sft ?? '') }}" />
                                @error('area_sft')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Location</label>
                                <input type="text" name="location"
                                    class="form-control form-control-solid @error('location') is-invalid @enderror"
                                    placeholder="e.g. Gulshan, Dhaka"
                                    value="{{ old('location', $editModeData->location ?? '') }}" />
                                @error('location')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Space Type -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Space Type</label>
                                <select name="space_type" required class="form-select form-select-solid @error('space_type') is-invalid @enderror">
                                    @foreach (\App\Models\Portfolio::SPACE_TYPES as $value => $label)
                                        <option value="{{ $value }}" @selected(old('space_type', $editModeData->space_type ?? 'residential') == $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('space_type')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Type -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Project Status</label>
                                <select name="status_type" required class="form-select form-select-solid @error('status_type') is-invalid @enderror">
                                    @foreach (\App\Models\Portfolio::STATUS_TYPES as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status_type', $editModeData->status_type ?? 'finished') == $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('status_type')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Date</label>
                                <input type="text" name="date" id="date" required
                                    class="form-control form-control-solid @error('date') is-invalid @enderror"
                                    placeholder="Enter Date" value="{{ old('date', $editModeData->date ?? '') }}" />
                                @error('date')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Featured -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Featured on Homepage</label>
                                <div class="form-check form-switch form-check-custom form-check-solid mt-3">
                                    <input type="hidden" name="is_featured" value="0">
                                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured"
                                        @checked(old('is_featured', $editModeData->is_featured ?? false))>
                                    <label class="form-check-label" for="is_featured">Show in featured portfolio section</label>
                                </div>
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

                            <!-- Image -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Image</label>
                                <input type="file" name="image" id="imageInput"
                                    class="form-control form-control-solid @error('image') is-invalid @enderror" />
                                <div class="mt-2">
                                    <img id="imagePreview"
                                        src="{{ isset($editModeData) && $editModeData->image ? Storage::url($editModeData->image) : '#' }}"
                                        alt="Preview"
                                        style="max-height: 100px; {{ isset($editModeData->image) ? '' : 'display:none;' }}">
                                </div>
                                @error('image')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Description</label>
                                <textarea name="description" id="kt_docs_ckeditor_classic"
                                    class="form-control form-control-solid @error('description') is-invalid @enderror" data-kt-autosize="true"> {!! old('description', $editModeData->description ?? '') !!}</textarea>
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
    <script src="{{ asset('assets/admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {

            ClassicEditor.create(document.querySelector("#kt_docs_ckeditor_classic"))
                .then((editor) => {
                    console.log(editor);
                })
                .catch((error) => {
                    console.error(error);
                });

            $("#date").flatpickr({
                dateFormat: "Y-m-d"
            });

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
