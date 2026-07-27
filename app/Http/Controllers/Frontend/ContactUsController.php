<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\ContactInquiry;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact.index');
    }

    public function store(ContactRequest $request): JsonResponse
    {
        try {
            ContactInquiry::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'message' => $request->message,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
        } catch (Exception $exception) {
            Log::error('Contact form submission failed', ['error' => $exception->getMessage()]);

            return response()->json(['status' => 'error', 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
