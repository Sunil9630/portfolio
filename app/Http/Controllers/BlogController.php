<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index',compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'nullable|image'
        ]);

        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->status = $request->status ?? 1;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'),$filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('blogs.index')
            ->with('success','Blog Added');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',compact('blog'));
    }

    public function update(Request $request,Blog $blog)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->status = $request->status;

        if($request->hasFile('image')){

            if($blog->image && File::exists(public_path('uploads/blogs/'.$blog->image))){
                File::delete(public_path('uploads/blogs/'.$blog->image));
            }

            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'),$filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('blogs.index')
            ->with('success','Updated');
    }

    public function destroy(Blog $blog)
    {
        if($blog->image && File::exists(public_path('uploads/blogs/'.$blog->image))){
            File::delete(public_path('uploads/blogs/'.$blog->image));
        }

        $blog->delete();

        return back()->with('success','Deleted');
    }
}