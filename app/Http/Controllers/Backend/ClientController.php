<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\FileManipulationHelper;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend.pages.clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = [
            'link' => $request->link
        ];

        if ($request->hasFile('logo')) {
            $path = FileManipulationHelper::storeFile($request->file('logo'), uniqid(), 'clients');
            $data['logo'] = $path;
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')
            ->with('success', 'New data added successfully!');
    }

    public function update(Request $request, Client $client)
    {
        $data = [
            'link' => $request->link
        ];

        if ($request->hasFile('logo')) {
            FileManipulationHelper::deletePublicFile($client->logo);
            $path = FileManipulationHelper::storeFile($request->file('logo'), uniqid(), 'clients');
            $data['logo'] = $path;
        } else {
            $data['logo'] = $client->logo;
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')
        ->with('success', 'New data updated successfully!');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
