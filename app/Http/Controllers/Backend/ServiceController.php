<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\FileManipulationHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.pages.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        if ($request->hasFile('logo')) {
            $path = FileManipulationHelper::storeFile($request->file('logo'), uniqid(), 'services');
            $data['logo'] = $path;
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'New data added successfully!');
    }

    public function update(Request $request, Service $service)
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        if ($request->hasFile('logo')) {
            FileManipulationHelper::deletePublicFile($service->logo);
            $path = FileManipulationHelper::storeFile($request->file('logo'), uniqid(), 'services');
            $data['logo'] = $path;
        } else {
            $data['logo'] = $service->logo;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
        ->with('success', 'New data updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
