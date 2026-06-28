<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Contact;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'contacts' => Contact::count(),
            'projects'      => Project::count(),
            'services'      => Service::count(),
            'skills'        => Skill::count(),
            'experiences'   => Experience::count(),
            'testimonials'  => Testimonial::count(),
            'blogs'         => Blog::count(),
            'messages'      => Contact::count(),
            'skillsList'   => Skill::select('name', 'percentage')->orderByDesc('percentage')->get()
        ]);
    }
}
