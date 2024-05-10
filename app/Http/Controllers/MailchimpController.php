<?php

namespace App\Http\Controllers;

use App\Services\Mailchimp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MailchimpController extends Controller
{
    public function __invoke(Request $request, Mailchimp $mail)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        try {
            $mail->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages(['email' => "this email can't be added to mailchimp."]);
        }
        return back()->with('popup message', 'your email have been stored successfuly');
    }
}
