<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\BulkMessage;
use Illuminate\Support\Facades\Mail;

class SMSController extends Controller
{

    public function index()
    {
        $bulkMessages = BulkMessage::latest()->get();
        $Sms = BulkMessage::all();
        $totalSms = $Sms->count();


        return view('dash.Messages', compact('bulkMessages', 'totalSms'));
    }

    public function sendSMS(Request $request)
    {
        $request->validate([
            'recipient_group' => 'required|string',
            'message' => 'required|string|max:480',
        ]);

        $messageTemplate = $request->message;
        $recipients = [];

        // 🔹 Select recipients
        if ($request->recipient_group === 'Customer') {
            $recipients = Customers::all(['name', 'email', 'status']);
        } elseif ($request->recipient_group === 'staff') {
            $recipients = User::all(['name', 'email', 'status']);
        }

        // 🔹 Loop recipients
        foreach ($recipients as $recipient) {
            // Replace placeholders dynamically
            $message = str_replace(
                ['{{ $name }}', '{{ $status }}'],
                [$recipient->name ?? 'User', $recipient->status ?? 'N/A'],
                $messageTemplate
            );

            // 1️⃣ Send Email
            if (!empty($recipient->email)) {
                Mail::raw($message, function ($mail) use ($recipient) {
                    $mail->to($recipient->email)
                        ->subject('Bulk Notification');
                });
            }

            // 2️⃣ Save to DB for tracking
            BulkMessage::create([
                'name'    => $recipient->name ?? 'Unknown',
                'email'   => $recipient->email ?? 'N/A',
                'message' => $message,
            ]);
        }

        return redirect()->route('dash.Messages.index')
            ->with('success', 'Bulk SMS & Emails sent successfully!');
    }

    /**
     * Delete bulk message
     */
    public function destroybulk($id)
    {
        $message = BulkMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Bulk message deleted successfully.');
    }
}
