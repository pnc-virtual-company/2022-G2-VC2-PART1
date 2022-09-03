<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Dotenv;
use  Mail;

use App\Mail\NotifyMail;


class SendEmailController extends Controller
{

    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, 'r')) {
            return true;
        } else {
            return false;
        }
    }
    public function sendEmail(Request $request)
    {
        if ($this->isOnline()) {
            $title = $request->subject;
            $isSent = Mail::to($request->email)->send(new NotifyMail($title));
            if ($isSent) {
                return response()->json(array('success' => 'Email sent successfully'));
            } else {
                return response()->json(array('success' => 'Email sent failed'));
            }
        } else {
            return "No connection!";
        }
    }
}
