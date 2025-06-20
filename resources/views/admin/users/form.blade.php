@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit User' : 'Add User'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Users', 'url' => route('admin.users.index')],
        ['label' => isset($editModeData) ? 'Edit User' : 'Add User', 'active' => true],
    ]" />

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
                                User List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-4">
                    <!-- User + Profile Form -->
                    <form method="POST"
                        action="{{ isset($editModeData) ? route('admin.users.update', $editModeData->id) : route('admin.users.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($editModeData)
                            @method('PUT')
                        @endisset

                        <div class="row mb-5">

                            <!-- Name -->
                            <div class="col-md-6 mb-5">
                                <label class="required fs-5 fw-bold mb-2">Name</label>
                                <input type="text" name="name" required
                                    class="form-control form-control-solid @error('name') is-invalid @enderror"
                                    placeholder="Enter name" value="{{ old('name', $editModeData->name ?? '') }}" />
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-5">
                                <label class="required fs-5 fw-bold mb-2">Email</label>
                                <input type="email" name="email" required placeholder="Enter email"
                                    class="form-control form-control-solid @error('email') is-invalid @enderror"
                                    value="{{ old('email', $editModeData->email ?? '') }}" />
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-5">
                                <label class="required fs-5 fw-bold mb-2">Phone</label>
                                <input type="text" name="phone" required placeholder="Enter phone"
                                    class="form-control form-control-solid @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $editModeData->profile->phone ?? '') }}" />
                                @error('phone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-5">
                                <label class="fs-5 fw-bold mb-2">Gender</label>
                                <select name="gender"
                                    class="form-select form-select-solid @error('gender') is-invalid @enderror"
                                    data-control="select2" data-placeholder="Select Gender">
                                    <option value="" disabled {{ !isset($editModeData) ? 'selected' : '' }}>Select
                                        Gender</option>
                                    <option value="Male" @selected(old('gender', $editModeData->profile->gender ?? '') == 'Male')>Male</option>
                                    <option value="Female" @selected(old('gender', $editModeData->profile->gender ?? '') == 'Female')>Female</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-5">
                                <label class="fs-5 fw-bold mb-2">Date of Birth</label>
                                <input type="text" name="dob" id="dob" placeholder="Enter dob"
                                    class="form-control form-control-solid @error('dob') is-invalid @enderror"
                                    value="{{ old('dob', $editModeData->profile->dob ?? '') }}" />
                                @error('dob')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-5">
                                <label class="fs-5 fw-bold mb-2">Address</label>
                                <input type="text" name="address" placeholder="Enter address"
                                    class="form-control form-control-solid @error('address') is-invalid @enderror"
                                    value="{{ old('address', $editModeData->profile->address ?? '') }}" />
                                @error('address')
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
                            <div class="col-md-6 mb-5">
                                <label class="fs-5 fw-bold mb-2">Profile Image</label>
                                <input type="file" name="picture" id="imageInput"
                                    class="form-control form-control-solid @error('picture') is-invalid @enderror" />
                                <div class="mt-2">
                                    <img id="imagePreview"
                                        src="{{ isset($editModeData->profile) && $editModeData->profile->picture ? Storage::url($editModeData->profile->picture) : '#' }}"
                                        alt="Preview"
                                        style="max-height: 100px; {{ isset($editModeData->profile->picture) ? '' : 'display:none;' }}">
                                </div>
                                @error('picture')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--  About Me / Description -->
                            <div class="col-md-12 mb-5">
                                <label class="fs-5 fw-bold mb-2">About Me</label>
                                <textarea name="about_me" placeholder="Enter about me"
                                    class="form-control form-control-solid @error('about_me') is-invalid @enderror" data-kt-autosize="true">{{ old('about_me', $editModeData->profile->about_me ?? '') }}</textarea>
                                @error('about_me')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--  Social Links -->
                            @php
                                $socials = ['facebook', 'twitter', 'linkedin', 'instagram'];
                            @endphp
                            @foreach ($socials as $social)
                                <div class="col-md-6 mb-5">
                                    <label class="fs-5 fw-bold mb-2 text-capitalize">{{ ucfirst($social) }} Link</label>
                                    <input type="url" name="{{ $social }}"
                                        class="form-control form-control-solid @error($social) is-invalid @enderror"
                                        placeholder="Enter {{ ucfirst($social) }} URL"
                                        value="{{ old($social, $editModeData->profile->$social ?? '') }}" />
                                    @error($social)
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
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
            $("#dob").flatpickr({
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
