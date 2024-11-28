<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\FileManipulationHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $data = [
            'alt' => $request->alt,
        ];

        if ($request->hasFile('image')) {
            $path = FileManipulationHelper::storeFile($request->file('image'), uniqid(), 'sliders');
            $data['image'] = $path;
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'New data added successfully!');
    }

    public function update(Request $request, Slider $slider)
    {
        $data = [
            'alt' => $request->alt,
        ];

        if ($request->hasFile('image')) {
            FileManipulationHelper::deletePublicFile($slider->image);
            $path = FileManipulationHelper::storeFile($request->file('image'), uniqid(), 'sliders');
            $data['image'] = $path;
        } else {
            $data['image'] = $slider->image;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'New data updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
