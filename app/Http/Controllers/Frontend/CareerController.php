<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyJobRequest;
use App\Mail\ApplyJobMail;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();
        return view('frontend.pages.careers.index', compact('careers'));
    }

    public function apply(ApplyJobRequest $request, Career $career)
    {
        $file = $request->file('cv');

        $fileData = json_encode([
            'content' => base64_encode($file->get()),
            'name' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
        ]);

        Mail::to(config('mail.from.address'))
            ->queue(
                new ApplyJobMail(
                    $request->only('email', 'cover_letter'),
                    $fileData,
                    $career
                )
            );

        // return back()->with('success', 'Thank you for applying the job at our company.');
        return response()->json([
            'message' => 'Thank you for applying the job at our company.'
        ]);
    }

    public function show(Career $career)
    {
        return view('frontend.pages.careers.show', compact('career'));
    }
}
