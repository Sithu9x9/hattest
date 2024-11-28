<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function about()
    {
        return view('frontend.pages.about');
    }

    public function organizationStructure()
    {
        return view('frontend.pages.organization-structure');
    }

    public function corporatePolicy()
    {
        return view('frontend.pages.corporate-policy');
    }
}
