<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $contacts = Contact::first();

        $projects = Project::latest()->take(6)->get();

        $skills = Skill::orderBy('percentage', 'desc')->get();

        $services = Service::all();

        $experiences = Experience::latest()->get();

        $testimonials = Testimonial::latest()->get();

        return view('home', compact(
            'setting',
            'projects',
            'skills',
            'services',
            'experiences',
            'testimonials',
            'contacts'
        ));
    }
}