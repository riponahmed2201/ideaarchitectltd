<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::query()->orderBy('sort_order')->latest('id')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View
    {
        return view('admin.faqs.form');
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        Faq::create($request->validated());
        notify()->success('FAQ created successfully.', 'Success');

        return to_route('admin.faqs.index');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.form', ['editModeData' => $faq]);
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->validated());
        notify()->success('FAQ updated successfully.', 'Success');

        return to_route('admin.faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json(['success' => true, 'message' => 'FAQ deleted successfully.']);
    }
}
