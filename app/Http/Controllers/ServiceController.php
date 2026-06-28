<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
    ]);

    $service = new Service();

    $service->title = $request->title;
    $service->description = $request->description;

    if ($request->hasFile('icon')) {
        $service->icon = $request->file('icon')->store('services', 'public');
    }

    $service->save();

    return redirect()->route('admin.services.index')
        ->with('success', 'Service Added Successfully.');
}

    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    public function update(Request $request, Service $service)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
    ]);

    $service->title = $request->title;
    $service->description = $request->description;

    if ($request->hasFile('icon')) {

        // Delete old image if it exists
        if ($service->icon && Storage::disk('public')->exists($service->icon)) {
            Storage::disk('public')->delete($service->icon);
        }

        // Store new image
        $service->icon = $request->file('icon')->store('services', 'public');
    }

    $service->save();

    return redirect()->route('admin.services.index')
        ->with('success', 'Service Updated Successfully.');
}

    public function destroy(Service $service)
{
    if ($service->icon && Storage::disk('public')->exists($service->icon)) {
        Storage::disk('public')->delete($service->icon);
    }

    $service->delete();

    return redirect()->route('admin.services.index')
        ->with('success', 'Service Deleted Successfully.');
}
}