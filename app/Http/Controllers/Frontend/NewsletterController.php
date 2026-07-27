<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\NewsletterSubscriber;
use Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(NewsletterRequest $request): JsonResponse
    {
        try {
            NewsletterSubscriber::create([
                'email' => $request->email,
                'subscribed_at' => now(),
            ]);

            return response()->json(['status' => 'success', 'message' => 'Thank you for subscribing!']);
        } catch (UniqueConstraintViolationException) {
            return response()->json(['status' => 'success', 'message' => 'You are already subscribed!']);
        } catch (Exception $exception) {
            Log::error('Newsletter subscribe failed', ['error' => $exception->getMessage()]);

            return response()->json(['status' => 'error', 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
