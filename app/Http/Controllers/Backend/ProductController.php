<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\FileManipulationHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.pages.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'category' => trim(rtrim($request->category, ',')),
            'playstore_link' => $request->playstore_link,
            'appstore_link' => $request->appstore_link,
        ];

        if ($request->hasFile('image')) {
            $path = FileManipulationHelper::storeFile($request->file('image'), uniqid(), 'products');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'New data added successfully!');
    }

    public function update(Request $request, Product $product)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'category' => trim(rtrim($request->category, ',')),
            'playstore_link' => $request->playstore_link,
            'appstore_link' => $request->appstore_link,
        ];

        if ($request->hasFile('image')) {
            FileManipulationHelper::deletePublicFile($product->image);
            $path = FileManipulationHelper::storeFile($request->file('image'), uniqid(), 'products');
            $data['image'] = $path;
        } else {
            $data['image'] = $product->image;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'New data updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
