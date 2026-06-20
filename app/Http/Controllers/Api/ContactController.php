<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PortfolioContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'recaptcha_token' => 'required|string'
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->recaptcha_token,
        ]);

        if (!$response->json('success')) {
            return response()->json(['message' => 'reCAPTCHA verification failed. Please try again.'], 403);
        }

        try {
            Mail::to('jeremiahoccupation@gmail.com')->send(new PortfolioContactMail($request->all()));
            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send email. Server error.'], 500);
        }
    }
}