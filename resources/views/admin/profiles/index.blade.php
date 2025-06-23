@extends('admin.layouts.app')

@push('styles')
    <style>
        .disabled-input-color {
            background-color: #d2d2d2 !important;
        }
    </style>
@endpush
@section('content')
    <x-toolbar :title="'Profile'"
               :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Profile', 'active' => true]]"/>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xxl-8">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ Storage::url($profile->profile->picture) }}" alt="{{ $profile->name }}"/>
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                               href="/admin/profile">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="/admin/password-change">
                                Password Change</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Row-->
            <div class="row g-5 g-xxl-8">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <div class="card mb-5 mb-xxl-8">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Profile Information</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">

                                <div class="mb-4">
                                    <h4 class="bg-light-dark p-3">Basic Information</h4>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Name</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->name }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Email</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->email }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Phone</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->phone }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Gender</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->gender }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Date of Birth</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->dob }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Address</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->address }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Status</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->status == 1 ? 'Active' : 'Inactive' }}"/>
                                </div>

                                <div class="col-md-12 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">About Me</label>
                                    <textarea class="form-control disabled-input-color" disabled
                                              data-kt-autosize="true">{{ $profile->profile->about_me }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <h4 class="bg-light-dark p-3">Social Profiles</h4>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Facebook Profile</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->facebook }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Linkedin Profile</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->linkedin }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Twitter Profile</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->twitter }}"/>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Instagram Profile</label>
                                    <input type="text" class="form-control disabled-input-color" disabled
                                           value="{{ $profile->profile->instagram }}"/>
                                </div>

                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('scripts')
    <script>
        $("#date_of_birth").flatpickr({
            dateFormat: "d-m-Y",
        });
    </script>
@endpush
