<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'company' => 'required|string|max:255',
            'interest' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $contactData = $request->only([
            'first_name', 'last_name', 'email', 'phone', 'company', 'interest', 'details'
        ]);

        try {
            Mail::to('support@blacklinemarketing.ae')->send(new ContactFormMail($contactData));
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully. We will get back to you soon!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage()
            ], 500);
        }
    }
}
