<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $services = Cache::remember('services', 60*60*24, function () {
            return Service::all();
        });

        $clients = Cache::remember('clients', 60*60*24, function () {
            return Client::all();
        });

        $products = Cache::remember('products', 60*60*24, function () {
            return Product::all();
        });

        $categories = [];
        foreach ($products as $product) {
            $productCategories = explode(', ', $product['category']);
            $categories = array_merge($categories, $productCategories);
        }

        // Remove duplicate categories and sort alphabetically
        $uniqueCategories = array_unique($categories);
        sort($uniqueCategories);

        return view('frontend.pages.products.index', compact('services', 'products', 'clients', 'uniqueCategories'));
    }
}
