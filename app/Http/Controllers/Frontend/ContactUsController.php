<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactInquiryMail;
use App\Models\ContactInquiry;
use App\Models\Setting;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $settings = [
            'site_email' => Setting::get('site_email', 'idea.architectsbd@gmail.com'),
            'site_phone_1' => Setting::get('site_phone_1', '+8801732-691745'),
            'site_phone_2' => Setting::get('site_phone_2', '+8801738-275126'),
            'site_address' => Setting::get('site_address', 'Mirpur - 6, Dhaka-1216, Bangladesh'),
            'whatsapp' => Setting::get('whatsapp_number', '8801841275126'),
        ];

        return view('frontend.pages.contact.index', compact('settings'));
    }

    public function store(ContactRequest $request): JsonResponse
    {
        try {
            $inquiry = ContactInquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'message' => $request->message,
            ]);

            $adminEmail = Setting::get('site_email', config('mail.from.address'));

            if ($adminEmail) {
                Mail::to($adminEmail)->send(new ContactInquiryMail($inquiry));
            }

            return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
        } catch (Exception $exception) {
            Log::error('Contact form submission failed', ['error' => $exception->getMessage()]);

            return response()->json(['status' => 'error', 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
