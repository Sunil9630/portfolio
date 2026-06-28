<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->paginate(10);

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company'=>'required|max:255',
            'designation'=>'required|max:255',
            'duration'=>'required|max:255',
            'description'=>'nullable'
        ]);

        Experience::create($request->all());

        return redirect()->route('experiences.index')
            ->with('success','Experience Added Successfully.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company'=>'required|max:255',
            'designation'=>'required|max:255',
            'duration'=>'required|max:255',
            'description'=>'nullable'
        ]);

        $experience->update($request->all());

        return redirect()->route('experiences.index')
            ->with('success','Experience Updated Successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return back()->with('success','Experience Deleted Successfully.');
    }
}