@extends('admin.layouts.app')

@push('styles')
    @include('admin.layouts.partials.datatable-styles')
@endpush

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit Blog' : 'Add Blog'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Blogs', 'url' => route('admin.blogs.index')],
        ['label' => isset($editModeData) ? 'Edit Blog' : 'Add Blog', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"></div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-check"></i> Blog List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.blogs.update', $editModeData->id) : route('admin.blogs.store') }}"
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
                                    placeholder="Enter blog title" value="{{ old('title', $editModeData->title ?? '') }}" />
                                @error('title')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tags -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Tags</label>
                                <select name="tags[]" multiple
                                    class="form-select form-select-solid @error('tags') is-invalid @enderror"
                                    data-control="select2" data-placeholder="Select Tags">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', isset($editModeData) ? $editModeData->tags->pluck('id')->toArray() : [])))>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Featured Image -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Featured Image</label>
                                <input type="file" name="featured_image" id="imageInput"
                                    class="form-control form-control-solid @error('featured_image') is-invalid @enderror" />
                                <div class="mt-2">
                                    <img id="imagePreview"
                                        src="{{ isset($editModeData) && $editModeData->featured_image ? asset('storage/' . $editModeData->featured_image) : '#' }}"
                                        alt="Preview"
                                        style="max-height: 100px; {{ isset($editModeData->featured_image) ? '' : 'display:none;' }}">
                                </div>
                                @error('featured_image')
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
                                    <option value="1" @selected(old('status', $editModeData->status ?? '') == 1)>Published</option>
                                    <option value="0" @selected(old('status', $editModeData->status ?? '') == 0)>Draft</option>
                                </select>
                                @error('status')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Short Description -->
                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Short Description</label>
                                <textarea name="short_description" required
                                    class="form-control form-control-solid @error('short_description') is-invalid @enderror"
                                    placeholder="Enter short description" data-kt-autosize="true">{{ old('short_description', $editModeData->short_description ?? '') }}</textarea>
                                @error('short_description')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Content</label>
                                <textarea name="content" id="content" required class="form-control form-control-solid @error('content') is-invalid @enderror"
                                    placeholder="Enter blog content" data-kt-autosize="true">{{ old('content', $editModeData->content ?? '') }}</textarea>
                                @error('content')
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
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {

            // Initialize CKEditor
            ClassicEditor.create(document.querySelector("#content"))
                .then((editor) => {
                    console.log(editor);
                })
                .catch((error) => {
                    console.error(error);
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
