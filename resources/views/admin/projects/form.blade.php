@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit Project' : 'Add Project'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Projects', 'url' => route('admin.projects.index')],
        ['label' => isset($editModeData) ? 'Edit Project' : 'Add Project', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-check"></i>
                                Project List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.projects.update', $editModeData->id) : route('admin.projects.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($editModeData)
                            @method('PUT')
                        @endisset

                        <div class="row mb-5">
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

                            <!-- Area (sqft) -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Area (sft)</label>
                                <input type="text" name="area_sft" required
                                    class="form-control form-control-solid @error('area_sft') is-invalid @enderror"
                                    placeholder="Enter area in sft"
                                    value="{{ old('area_sft', $editModeData->area_sft ?? '') }}" />
                                @error('area_sft')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Location</label>
                                <input type="text" name="location" required
                                    class="form-control form-control-solid @error('location') is-invalid @enderror"
                                    placeholder="Enter location"
                                    value="{{ old('location', $editModeData->location ?? '') }}" />
                                @error('location')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- URL -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">URL (optional)</label>
                                <input type="text" name="url"
                                    class="form-control form-control-solid @error('url') is-invalid @enderror"
                                    placeholder="Enter URL" value="{{ old('url', $editModeData->url ?? '') }}" />
                                @error('url')
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
                                    class="form-control form-control-solid @error('description') is-invalid @enderror" data-kt-autosize="true">{!! old('description', $editModeData->description ?? '') !!}</textarea>
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
