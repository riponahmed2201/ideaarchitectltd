@extends('admin.layouts.app')

@section('content')
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
                                <img src="{{ asset('assets/admin/media/avatars/300-1.jpg') }}" alt="image" />
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Max
                                            Smith</a>
                                        <a href="#">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                        fill="#00A3FF" />
                                                    <path class="permanent"
                                                        d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Developer</a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->SF, Bay Area</a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                        fill="black" />
                                                    <path
                                                        d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->max@kt.com</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                            rx="1" transform="rotate(90 13 6)" fill="black" />
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Earnings</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="13" height="2"
                                                            rx="1" transform="rotate(-90 11 18)"
                                                            fill="black" />
                                                        <path
                                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="80">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Projects</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                            rx="1" transform="rotate(90 13 6)" fill="black" />
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Success Rate</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bold fs-6 text-gray-400">Profile Compleation</span>
                                        <span class="fw-bolder fs-6">50%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                                href="/profile/overview">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                                href="/profile/education">Education</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="/profile/job-history">Job
                                History</a>
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
                        <div class="card-header border-0 pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Edit Profile Information</span>
                                <span class="text-muted fw-bold fs-7">Please complete your profile</span>
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
                                    <label class="required fs-5 fw-bold mb-2">Name</label>
                                    <input type="text" required
                                        class="form-control form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Enter name" name="name"
                                        value="{{ $editModeData->name ?? old('name') }}" />
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Email</label>
                                    <input type="text" required
                                        class="form-control form-control-solid @error('email') is-invalid @enderror"
                                        placeholder="Enter email" name="email"
                                        value="{{ $editModeData->email ?? old('email') }}" />
                                    @error('email')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Contact Number</label>
                                    <input type="text" required
                                        class="form-control form-control-solid @error('contact_number') is-invalid @enderror"
                                        placeholder="Enter contact number" name="contact_number"
                                        value="{{ $editModeData->contact_number ?? old('contact_number') }}" />
                                    @error('contact_number')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Emergency Contact</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('emergency_contact') is-invalid @enderror"
                                        placeholder="Enter emergency contact" name="emergency_contact"
                                        value="{{ $editModeData->emergency_contact ?? old('emergency_contact') }}" />
                                    @error('emergency_contact')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Batch</label>
                                    <input type="text" required
                                        class="form-control form-control-solid @error('batch') is-invalid @enderror"
                                        placeholder="Enter batch" name="batch"
                                        value="{{ $editModeData->batch ?? old('batch') }}" />
                                    @error('batch')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Graduation Year</label>
                                    <input type="text" required
                                        class="form-control form-control-solid @error('graduation_year') is-invalid @enderror"
                                        placeholder="Enter graduation year" name="graduation_year"
                                        value="{{ $editModeData->graduation_year ?? old('graduation_year') }}" />
                                    @error('graduation_year')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Gender</label>
                                    <select name="gender" required
                                        class="form-select form-select-solid @error('gender') is-invalid @enderror"
                                        data-control="select2" data-placeholder="Select Gender">
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Date of Birth</label>
                                    <input type="text" required
                                        class="form-control form-control-solid @error('date_of_birth') is-invalid @enderror"
                                        placeholder="Enter date of birth" name="date_of_birth" id="date_of_birth"
                                        value="{{ $editModeData->date_of_birth ?? old('date_of_birth') }}" />
                                    @error('date_of_birth')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Profile Image</label>
                                    <input type="file" required
                                        class="form-control form-control-solid @error('profile_image') is-invalid @enderror"
                                        name="profile_image"
                                        value="{{ $editModeData->profile_image ?? old('profile_image') }}" />
                                    @error('profile_image')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <h4 class="bg-light-dark p-3">Social Links</h4>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Facebook Profile</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('facebook_profile') is-invalid @enderror"
                                        placeholder="Enter facebook profile" name="facebook_profile"
                                        value="{{ $editModeData->facebook_profile ?? old('facebook_profile') }}" />
                                    @error('facebook_profile')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Linkedin Profile</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('linkedin_profile') is-invalid @enderror"
                                        placeholder="Enter linkedin profile" name="linkedin_profile"
                                        value="{{ $editModeData->linkedin_profile ?? old('linkedin_profile') }}" />
                                    @error('linkedin_profile')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Github Profile</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('github_profile') is-invalid @enderror"
                                        placeholder="Enter github profile" name="github_profile"
                                        value="{{ $editModeData->github_profile ?? old('github_profile') }}" />
                                    @error('github_profile')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Twitter Profile</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('twitter_profile') is-invalid @enderror"
                                        placeholder="Enter twitter profile" name="twitter_profile"
                                        value="{{ $editModeData->twitter_profile ?? old('twitter_profile') }}" />
                                    @error('twitter_profile')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Portfolio Profile</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('portfolio_website') is-invalid @enderror"
                                        placeholder="Enter portfolio website" name="portfolio_website"
                                        value="{{ $editModeData->portfolio_website ?? old('portfolio_website') }}" />
                                    @error('portfolio_website')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <h4 class="bg-light-dark p-3">Volunteering & Mentoring</h4>
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Is Volunteer</label>
                                    <select name="is_volunteer" required
                                        class="form-select form-select-solid @error('is_volunteer') is-invalid @enderror"
                                        data-control="select2" data-placeholder="Select Lead Type">
                                        <option selected value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    @error('is_volunteer')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Is Mentor</label>
                                    <select name="gender" required
                                        class="form-select form-select-solid @error('gender') is-invalid @enderror"
                                        data-control="select2" data-placeholder="Select Lead Type">
                                        <option selected value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <h4 class="bg-light-dark p-3">Additional Information</h4>
                                </div>

                                <div class="col-md-12 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Bio</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter dio" name="bio" data-kt-autosize="true">{{ $editModeData->bio ?? old('bio') }}</textarea>
                                    @error('bio')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Present Address</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter present address" name="present_address"
                                        data-kt-autosize="true">{{ $editModeData->present_address ?? old('present_address') }}</textarea>
                                    @error('present_address')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Permanent Address</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter permanent address" name="permanent_address"
                                        data-kt-autosize="true">{{ $editModeData->permanent_address ?? old('permanent_address') }}</textarea>
                                    @error('permanent_address')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 fv-row mb-5">
                                    <label class="required fs-5 fw-bold mb-2">Is Visible</label>
                                    <select name="is_visible" required
                                        class="form-select form-select-solid @error('is_visible') is-invalid @enderror"
                                        data-control="select2" data-placeholder="Please Select">
                                        <option selected value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    @error('is_visible')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
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
