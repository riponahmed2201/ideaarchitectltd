<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\View\View;

class QuoteRequestController extends Controller
{
    public function index(): View
    {
        $quotes = QuoteRequest::query()->latest()->paginate(20);

        return view('admin.quote_requests.index', compact('quotes'));
    }

    public function show(QuoteRequest $quoteRequest): View
    {
        if (! $quoteRequest->is_read) {
            $quoteRequest->update(['is_read' => true]);
        }

        return view('admin.quote_requests.show', compact('quoteRequest'));
    }

    public function destroy(QuoteRequest $quoteRequest)
    {
        $quoteRequest->delete();

        return response()->json(['success' => true, 'message' => 'Quote request deleted successfully.']);
    }
}
