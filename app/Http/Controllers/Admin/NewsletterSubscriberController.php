<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\View\View;

class NewsletterSubscriberController extends Controller
{
    public function index(): View
    {
        $subscribers = NewsletterSubscriber::query()->latest('subscribed_at')->paginate(30);

        return view('admin.newsletter.index', compact('subscribers'));
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->delete();

        return response()->json(['success' => true, 'message' => 'Subscriber removed successfully.']);
    }
}
