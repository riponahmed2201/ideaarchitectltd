@extends('admin.layouts.app')

@section('content')
    <!--begin::Toolbar -->
    <x-toolbar :title="'Dashbaord'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Dashbaord', 'active' => true]]" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">My Header</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Preview monthly events</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="" class="btn btn-primary">Manage
                            Calendar</a>
                    </div>
                </div>
                <div class="card-body">
                    ====================
                </div>
            </div>
        </div>
    </div>
@endsection
