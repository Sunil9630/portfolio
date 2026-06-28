<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title'     => 'nullable|string|max:255',
            'site_logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'name'           => 'nullable|string|max:255',
            'designation'    => 'nullable|string|max:255',
            'about'          => 'nullable|string',

            'email'          => 'nullable|email|max:255',
            'phone'          => 'nullable|string|max:20',
            'address'        => 'nullable|string|max:255',

            'profile_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'resume'         => 'nullable|mimes:pdf|max:5120',
        ]);

        $setting = Setting::firstOrNew();

        $setting->site_title = $request->site_title;
        $setting->name = $request->name;
        $setting->designation = $request->designation;
        $setting->about = $request->about;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;

        /*
        |--------------------------------------------------------------------------
        | Site Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('site_logo')) {

            if (
                $setting->site_logo &&
                Storage::disk('public')->exists($setting->site_logo)
            ) {
                Storage::disk('public')->delete($setting->site_logo);
            }

            $setting->site_logo = $request
                ->file('site_logo')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Profile Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_image')) {

            if (
                $setting->profile_image &&
                Storage::disk('public')->exists($setting->profile_image)
            ) {
                Storage::disk('public')->delete($setting->profile_image);
            }

            $setting->profile_image = $request
                ->file('profile_image')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Resume
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('resume')) {

            if (
                $setting->resume &&
                Storage::disk('public')->exists($setting->resume)
            ) {
                Storage::disk('public')->delete($setting->resume);
            }

            $setting->resume = $request
                ->file('resume')
                ->store('settings', 'public');
        }

        $setting->save();

        return redirect()
            ->back()
            ->with('success', 'Settings Updated Successfully.');
    }
}