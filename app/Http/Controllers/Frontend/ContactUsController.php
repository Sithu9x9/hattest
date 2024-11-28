<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(ContactUsRequest $request)
    {
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$request->secret&response=$request->response");

        $verifyResponse = json_decode($verify);

        if (!empty($verifyResponse->success) && $verifyResponse->success) {
            Mail::to(config('mail.from.address'))->queue(new ContactUsMail($request->validated()));
            return back()->with('success', 'Thank for contact with us. We\'ll get back to you asap.');
        } else {
            return back()->with('error', 'Something wrong with Recaptcha!');
        }
    }
}
