<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->paginate(10);

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'percentage' => 'required|integer|min:0|max:100'
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill Added Successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|max:100',
            'percentage' => 'required|integer|min:0|max:100'
        ]);

        $skill->update($request->all());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill Updated Successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return back()->with('success', 'Skill Deleted Successfully.');
    }
}