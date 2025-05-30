@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit Videos' : 'Add Videos'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Videoss', 'url' => route('admin.videos.index')],
        ['label' => isset($editModeData) ? 'Edit Videos' : 'Add Videos', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-check"></i>
                                Videos List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.videos.update', $editModeData->id) : route('admin.videos.store') }}">
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

                            <!-- Area (sqft) -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Area (sft)</label>
                                <input type="text" name="area_sft"
                                    class="form-control form-control-solid @error('area_sft') is-invalid @enderror"
                                    placeholder="Enter area in sft"
                                    value="{{ old('area_sft', $editModeData->area_sft ?? '') }}" />
                                @error('area_sft')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- URL -->
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Embed Code (URL)</label>
                                <input type="text" name="url" required
                                    class="form-control form-control-solid @error('url') is-invalid @enderror"
                                    placeholder="Enter URL" value="{{ old('url', $editModeData->url ?? '') }}" />
                                @error('url')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Description</label>
                                <textarea name="description" required class="form-control form-control-solid @error('description') is-invalid @enderror"
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
