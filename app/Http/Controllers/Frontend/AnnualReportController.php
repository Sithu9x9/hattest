<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AnnualReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AnnualReportController extends Controller
{
    public function index()
    {
        $annualReports = AnnualReport::paginate(12);
        return view('frontend.pages.annual-report.index', compact('annualReports'));
    }

    public function download(AnnualReport $annualReport)
    {
        $filePath = public_path($annualReport->file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'Requested file does not exist on our server!');
        }
    }
}
