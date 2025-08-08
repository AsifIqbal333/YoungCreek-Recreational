<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactUsNotification;
use Illuminate\Validation\Rule;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        // swing-mat, rubber-timber
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'product_interest' => 'required|array',
            'message' => 'required|string',
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'out_of_mailing_list' => 'nullable',
            'category' => 'nullable|string',
            'border_length' => [
                Rule::requiredIf(function () use ($request) {
                    return border_required($request->category);
                }),
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    // Only validate if category requires border_length
                    if (border_required($request->category)) {
                        if ($value % 4 !== 0) {
                            $fail('The ' . $attribute . ' must be a multiple of 4.');
                        }
                    }
                }
            ],
            // 'g-recaptcha-response' => 'required|string'
        ]);

        // Verifying google recaptcha
        $secretKey = config('services.recaptcha.secret_key');
        $responseKey = $request->input('g-recaptcha-response', '');
        $userIP = $request->ip();
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $responseData = json_decode($response);
        if (!$responseData->success) {
            return back()->withInput()->with('error', 'Robot verification failed. Please try again.');
        }

        // create quote request
        QuoteRequest::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'product_interest' => json_encode($request->product_interest),
            'message' => $request->message,
            'organization_name' => $request->organization_name,
            'organization_type' => $request->organization_type,
            'budget' => $request->budget,
            'category' => ucwords(str_replace("-", " ", $request->category)),
            'border_length' => $request->border_length,
        ]);

        // Send the email to the admin
        Notification::route('mail', config('services.admin_email', 'chris@youngcreekrec.com'))
            ->notify(new ContactUsNotification($data));

        // Redirect back with a success message
        return back()->with('success', 'Thank you for contacting us!');

    }
}
