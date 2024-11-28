<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Stock_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockInformationController extends Controller
{
    public function index()
    {
        $stocks = Stock::paginate(12);
        return view('frontend.pages.stock-information.index', compact('stocks'));
    }

    public function show(Stock $stockInformation)
    {
        $stockInformation->load('stock_posts');
        return view('frontend.pages.stock-information.show', compact('stockInformation'));
    }

    public function showPost(Stock_posts $stockInformationPost)
    {
        return view('frontend.pages.stock-information.post', compact('stockInformationPost'));
    }
}
