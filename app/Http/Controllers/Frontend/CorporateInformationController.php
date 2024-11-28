<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CorporateInformation;
use App\Models\CorporateInformation_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorporateInformationController extends Controller
{
    public function index()
    {
        $corporateInformations = CorporateInformation::paginate(12);
        return view('frontend.pages.corporate-information.index', compact('corporateInformations'));
    }

    public function show(CorporateInformation $corporateInformation)
    {
        $corporateInformation->load('corporate_information_posts');
        return view('frontend.pages.corporate-information.show', compact('corporateInformation'));
    }

    public function showPost(CorporateInformation_posts $corporateInformationPost)
    {
        return view('frontend.pages.corporate-information.post', compact('corporateInformationPost'));
    }
}
