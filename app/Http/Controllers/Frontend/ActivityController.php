<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Activities_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activities::paginate(12);
        return view('frontend.pages.activities.index', compact('activities'));
    }

    public function show(Activities $activity)
    {
        $activity->load('activities_posts');
        return view('frontend.pages.activities.show', compact('activity'));
    }

    public function showPost(Activities_posts $activityPost)
    {
        return view('frontend.pages.activities.post', compact('activityPost'));
    }
}
