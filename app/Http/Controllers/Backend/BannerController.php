<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\FileManipulationHelper;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.pages.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $data = [
            'alt' => $request->alt,
        ];

        if ($request->hasFile('image')) {
            $path = FileManipulationHelper::storeFile($request->file('image'), uniqid(), 'banners');
            $data['image'] = $path;
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'New data added successfully!');
    }

    public function update(Request $request, Banner $banner)
    {
        $data = [
            'alt' => $request->alt,
        ];

        if ($request->hasFile('image')) {
            FileManipulationHelper::deletePublicFile($banner->image);
            $path = FileManipulationHelper::storeFile($request->file('image'), uniqid(), 'banners');
            $data['image'] = $path;
        } else {
            $data['image'] = $banner->image;
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'New data updated successfully!');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
