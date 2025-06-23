@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Show Team Member'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Team Members', 'url' => route('admin.users.index')],
        ['label' => 'Show Team Member', 'active' => true],
    ]"/>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-check"></i>
                                Team Member List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <!-- User + Profile Form -->
                    <div class="row mb-5">

                        <!-- Name -->
                        <div class="col-md-6 mb-5">
                            <label class="fs-5 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                   value="{{ $user->name }}"/>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-5">
                            <label class="fs-5 fw-bold mb-2">Email</label>
                            <input type="text" disabled class="form-control form-control-solid"
                                   value="{{ $user->email }}"/>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-5">
                            <label class="fs-5 fw-bold mb-2">Phone</label>
                            <input type="text" disabled class="form-control form-control-solid"
                                   value="{{ $user->profile->phone }}"/>
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Gender</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                   value="{{ $user->profile->gender }}"/>
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Date of Birth</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                   value="{{ $user->profile->dob }}"/>
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Address</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                   value="{{ $user->profile->address }}"/>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Status</label>
                            <input type="text" disabled class="form-control form-control-solid"
                                   value="{{ $user->status == 1 ? 'Active' : 'Inactive' }}">
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-5">
                            <label class="fs-5 fw-bold mb-2">Profile Image</label>
                            <div class="mt-2">
                                <img src="{{ isset($user->profile) && Storage::url($user->profile->picture) ?: '#' }}"
                                     alt="Preview" style="max-height: 100px;">
                            </div>
                        </div>

                        <!--  About Me / Description -->
                        <div class="col-md-12 mb-5">
                            <label class="fs-5 fw-bold mb-2">About Me</label>
                            <textarea disabled class="form-control form-control-solid"
                                      data-kt-autosize="true">{{ $user->profile->about_me }}</textarea>
                        </div>

                        <!--  Social Links -->
                        @php
                            $socials = ['facebook', 'twitter', 'linkedin', 'instagram'];
                        @endphp
                        @foreach ($socials as $social)
                            <div class="col-md-6 mb-5">
                                <label class="fs-5 fw-bold mb-2 text-capitalize">{{ ucfirst($social) }} Link</label>
                                <input type="text" class="form-control form-control-solid" disabled
                                       value="{{ $user->profile->$social ?? '' }}"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
