@extends('admin.layouts.app')

@section('content')
    @php $item = $testimonial ?? null; @endphp
    <x-toolbar :title="$item ? 'Edit Testimonial' : 'Add Testimonial'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Testimonials', 'url' => route('admin.testimonials.index')], ['label' => $item ? 'Edit' : 'Add', 'active' => true]]" />
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card"><div class="card-body">
                <form method="POST" action="{{ $item ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" enctype="multipart/form-data">
                    @csrf @if($item) @method('PUT') @endif
                    <div class="row">
                        <div class="col-md-6 mb-4"><label class="required fw-bold">Client Name</label><input type="text" name="client_name" class="form-control" value="{{ old('client_name', $item->client_name ?? '') }}" required></div>
                        <div class="col-md-6 mb-4"><label class="fw-bold">Designation</label><input type="text" name="designation" class="form-control" value="{{ old('designation', $item->designation ?? '') }}"></div>
                        <div class="col-12 mb-4"><label class="required fw-bold">Quote</label><textarea name="quote" class="form-control" rows="4" required>{{ old('quote', $item->quote ?? '') }}</textarea></div>
                        <div class="col-md-4 mb-4"><label class="fw-bold">Portfolio</label><select name="portfolio_id" class="form-select"><option value="">None</option>@foreach($portfolios as $p)<option value="{{ $p->id }}" @selected(old('portfolio_id', $item->portfolio_id ?? '') == $p->id)>{{ $p->title }}</option>@endforeach</select></div>
                        <div class="col-md-4 mb-4"><label class="required fw-bold">Rating</label><select name="rating" class="form-select">@for($i=1;$i<=5;$i++)<option value="{{ $i }}" @selected(old('rating', $item->rating ?? 5) == $i)>{{ $i }}</option>@endfor</select></div>
                        <div class="col-md-4 mb-4"><label class="required fw-bold">Status</label><select name="status" class="form-select"><option value="1" @selected(old('status', $item->status ?? 1) == 1)>Active</option><option value="0" @selected(old('status', $item->status ?? 1) == 0)>Inactive</option></select></div>
                        <div class="col-md-6 mb-4"><label class="fw-bold">Photo</label><input type="file" name="image" class="form-control"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div></div>
        </div>
    </div>
@endsection
