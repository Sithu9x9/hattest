<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MeetingMinute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MeetingMinuteController extends Controller
{
    public function index()
    {
        $meetingMinutes = MeetingMinute::paginate(8);
        return view('frontend.pages.meeting-minutes.index', compact('meetingMinutes'));
    }

    public function download(MeetingMinute $meetingMinute)
    {
        $filePath = public_path($meetingMinute->file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'Requested file does not exist on our server!');
        }
    }
}
