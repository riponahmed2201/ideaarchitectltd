@extends('admin.layouts.app')

@push('styles')
    @include('admin.layouts.partials.datatable-styles')
@endpush

@section('content')
    <!--begin::Toolbar -->
    <x-toolbar :title="isset($editModeData) ? 'Edit Tag' : 'Add Tag'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Tags', 'url' => route('admin.tags.index')],
        ['label' => isset($editModeData) ? 'Edit Tag' : 'Add Tag', 'active' => true],
    ]" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Add Tag-->
                            <a href="/admin/tags" class="btn btn-primary">
                                <i class="bi bi-list-check"></i>
                                Tag List
                            </a>
                            <!--end::Add Tag-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Form-->
                    <form class="form" method="POST"
                        action="{{ isset($editModeData) ? route('admin.tags.update', $editModeData->id) : route('admin.tags.store') }}">
                        @csrf

                        @isset($editModeData)
                            @method('PUT')
                            <input type="text" hidden name="id" value="{{ $editModeData->id }}">
                        @endisset

                        <div class="row mb-5">

                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Name</label>
                                <input type="text" required
                                    class="form-control form-control-solid @error('name') is-invalid @enderror"
                                    placeholder="Enter name" name="name"
                                    value="{{ $editModeData->name ?? old('name') }}" />
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Status</label>
                                <select name="status" required
                                    class="form-select form-select-solid @error('status') is-invalid @enderror"
                                    data-control="select2" data-placeholder="Select Status">

                                    <option value=""></option>
                                    <option value="1" @selected(isset($editModeData) && $editModeData->status == 1)>Active</option>
                                    <option value="0" @selected(isset($editModeData) && $editModeData->status == 0)>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
@endsection
