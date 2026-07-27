@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Site Settings'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Settings', 'active' => true]]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">General Settings</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-5">
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Site Name</label>
                                <input type="text" name="site_name" class="form-control form-control-solid" value="{{ old('site_name', $settings['site_name']) }}" required />
                            </div>
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Site Email</label>
                                <input type="email" name="site_email" class="form-control form-control-solid" value="{{ old('site_email', $settings['site_email']) }}" required />
                            </div>
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Phone 1</label>
                                <input type="text" name="site_phone_1" class="form-control form-control-solid" value="{{ old('site_phone_1', $settings['site_phone_1']) }}" required />
                            </div>
                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Phone 2</label>
                                <input type="text" name="site_phone_2" class="form-control form-control-solid" value="{{ old('site_phone_2', $settings['site_phone_2']) }}" />
                            </div>
                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Address</label>
                                <textarea name="site_address" class="form-control form-control-solid" rows="2" required>{{ old('site_address', $settings['site_address']) }}</textarea>
                            </div>
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Awards Count (Homepage)</label>
                                <input type="number" name="awards_count" class="form-control form-control-solid" value="{{ old('awards_count', $settings['awards_count']) }}" min="0" required />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
