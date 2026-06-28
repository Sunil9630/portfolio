<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'technology' => 'nullable',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $project = new Project();

        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->technology = $request->technology;
        $project->github_link = $request->github_link;
        $project->live_link = $request->live_link;

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('projects', 'public');

            $project->image = $path;
        }

        $project->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project Added Successfully');
    }

    public function show(Project $project)
    {
        return view('project-details', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'technology' => 'nullable',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->technology = $request->technology;
        $project->github_link = $request->github_link;
        $project->live_link = $request->live_link;

        if ($request->hasFile('image')) {

            // Delete old image
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            // Upload new image
            $path = $request->file('image')->store('projects', 'public');

            $project->image = $path;
        }

        $project->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project Updated Successfully');
    }

    public function destroy(Project $project)
    {
        if ($project->image && File::exists(public_path('uploads/projects/' . $project->image))) {

            File::delete(public_path('uploads/projects/' . $project->image));
        }

        $project->delete();

        return back()->with('success', 'Project Deleted Successfully');
    }

    public function portfolio()
    {
        $projects = Project::latest()->get();

        return view('portfolio', compact('projects'));
    }
}
