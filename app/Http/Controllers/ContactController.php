<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\ContactMessage;
use App\Models\User;
use App\Notifications\NewContactMessageNotification;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $message = ContactMessage::create($request->validated());

        $this->notifyAdmin($message);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }

    /** Send email notification to admin (uses Resend/SMTP/log driver from .env). */
    private function notifyAdmin(ContactMessage $message): void
    {
        try {
            $adminEmail = config('portfolio.admin_email');

            $admin = User::where('email', $adminEmail)->first();

            if ($admin) {
                $admin->notify(new NewContactMessageNotification($message));
            } else {
                Notification::route('mail', $adminEmail)
                    ->notify(new NewContactMessageNotification($message));
            }
        } catch (\Throwable $e) {
            // Don't block the visitor if mail fails — message is still saved in DB
            report($e);
        }
    }
}
