<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FinancialReportController extends Controller
{
    public function index()
    {
        $financialReports = FinancialReport::paginate(12);
        return view('frontend.pages.financial-report.index', compact('financialReports'));
    }

    public function download(FinancialReport $financialReport)
    {
        $filePath = public_path($financialReport->file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'Requested file does not exist on our server!');
        }
    }
}
