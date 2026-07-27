<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultationRequest;
use App\Mail\QuoteRequestMail;
use App\Models\QuoteRequest;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::where('status', 1)->get();

        return view('frontend.pages.quote.index', compact('serviceCategories'));
    }

    public function store(ConsultationRequest $request): JsonResponse
    {
        try {
            $quote = QuoteRequest::create($request->validated());

            $adminEmail = Setting::get('site_email', config('mail.from.address'));

            if ($adminEmail) {
                Mail::to($adminEmail)->send(new QuoteRequestMail($quote));
            }

            return response()->json(['status' => 'success', 'message' => 'Your consultation request has been submitted successfully!']);
        } catch (Exception $exception) {
            Log::error('Quote request failed', ['error' => $exception->getMessage()]);

            return response()->json(['status' => 'error', 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
