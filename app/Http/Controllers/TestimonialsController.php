<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'designation'=>'nullable',
            'message'=>'required',
            'image'=>'nullable|image'
        ]);

        $testimonial = new Testimonial();

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'),$filename);
            $testimonial->image = $filename;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')
            ->with('success','Testimonial Added');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name'=>'required',
            'designation'=>'nullable',
            'message'=>'required'
        ]);

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;

        if($request->hasFile('image')){

            if($testimonial->image && File::exists(public_path('uploads/testimonials/'.$testimonial->image))){
                File::delete(public_path('uploads/testimonials/'.$testimonial->image));
            }

            $image = $request->file('image');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/testimonials'),$filename);

            $testimonial->image = $filename;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')
            ->with('success','Updated Successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        if($testimonial->image && File::exists(public_path('uploads/testimonials/'.$testimonial->image))){
            File::delete(public_path('uploads/testimonials/'.$testimonial->image));
        }

        $testimonial->delete();

        return back()->with('success','Deleted Successfully');
    }
}