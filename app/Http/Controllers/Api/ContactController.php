<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PortfolioContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'recaptcha_token' => 'required|string',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->recaptcha_token,
        ]);

        if (! $response->json('success')) {
            // BINAGO NATIN ITO: Idinagdag natin ang error codes ni Google at chineck kung may laman ang env
            return response()->json([
                'message' => 'reCAPTCHA verification failed. Please try again.',
                'google_error' => $response->json('error-codes'), 
                'has_secret_key' => env('RECAPTCHA_SECRET_KEY') ? 'YES' : 'NO - Blanko ang key!'
            ], 403);
        }

        try {
            Mail::to('jeremiahoccupation@gmail.com')->send(new PortfolioContactMail($request->all()));

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send email. Server error.'], 500);
        }
    }
}
