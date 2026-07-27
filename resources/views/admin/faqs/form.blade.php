@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="isset($editModeData) ? 'Edit FAQ' : 'Add FAQ'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'FAQs', 'url' => route('admin.faqs.index')], ['label' => isset($editModeData) ? 'Edit' : 'Add', 'active' => true]]" />
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card"><div class="card-body">
                <form method="POST" action="{{ isset($editModeData) ? route('admin.faqs.update', $editModeData) : route('admin.faqs.store') }}">
                    @csrf @isset($editModeData) @method('PUT') @endisset
                    <div class="mb-5"><label class="required fw-bold">Question</label><input type="text" name="question" class="form-control" value="{{ old('question', $editModeData->question ?? '') }}" required></div>
                    <div class="mb-5"><label class="required fw-bold">Answer</label><textarea name="answer" class="form-control" rows="5" required>{{ old('answer', $editModeData->answer ?? '') }}</textarea></div>
                    <div class="mb-5"><label class="fw-bold">Sort Order</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $editModeData->sort_order ?? 0) }}"></div>
                    <div class="mb-5"><label class="required fw-bold">Status</label><select name="status" class="form-select"><option value="1" @selected(old('status', $editModeData->status ?? 1) == 1)>Active</option><option value="0" @selected(old('status', $editModeData->status ?? 1) == 0)>Inactive</option></select></div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div></div>
        </div>
    </div>
@endsection
