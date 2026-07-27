<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function __construct(private ImageUploadService $imageUpload) {}

    public function index(): View
    {
        $testimonials = Testimonial::with('portfolio')->latest()->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        $portfolios = Portfolio::where('status', 1)->latest()->get(['id', 'title']);

        return view('admin.testimonials.form', compact('portfolios'));
    }

    public function store(TestimonialRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageUpload->store($request->file('image'), 'testimonials');
        }

        Testimonial::create($data);
        notify()->success('Testimonial created successfully.', 'Success');

        return to_route('admin.testimonials.index');
    }

    public function edit(Testimonial $testimonial): View
    {
        $portfolios = Portfolio::where('status', 1)->latest()->get(['id', 'title']);

        return view('admin.testimonials.form', compact('testimonial', 'portfolios'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $this->imageUpload->delete($testimonial->image);
            $data['image'] = $this->imageUpload->store($request->file('image'), 'testimonials');
        }

        $testimonial->update($data);
        notify()->success('Testimonial updated successfully.', 'Success');

        return to_route('admin.testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->imageUpload->delete($testimonial->image);
        $testimonial->delete();

        return response()->json(['success' => true, 'message' => 'Testimonial deleted successfully.']);
    }
}
