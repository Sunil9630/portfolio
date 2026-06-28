@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <form action="{{ route('admin.settings.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header bg-primary text-white py-3">

                <h3 class="mb-0">

                    Website Settings

                </h3>

            </div>

            <div class="card-body p-4">

                <div class="row">

                    <div class="col-lg-8">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">

                                    Site Title

                                </label>

                                <input
                                    type="text"
                                    name="site_title"
                                    class="form-control"
                                    value="{{ old('site_title',$setting->site_title ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">

                                    Full Name

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name',$setting->name ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">

                                    Designation

                                </label>

                                <input
                                    type="text"
                                    name="designation"
                                    class="form-control"
                                    value="{{ old('designation',$setting->designation ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">

                                    Email

                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email',$setting->email ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">

                                    Phone

                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone',$setting->phone ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">

                                    Address

                                </label>

                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    value="{{ old('address',$setting->address ?? '') }}">

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label fw-bold">

                                    About

                                </label>

                                <textarea
                                    name="about"
                                    rows="6"
                                    class="form-control">{{ old('about',$setting->about ?? '') }}</textarea>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card shadow-sm mb-4">

                            <div class="card-body text-center">

                                <h5>Site Logo</h5>

                                @if($setting && $setting->site_logo)

                                    <img
                                        src="{{ Storage::url($setting->site_logo) }}"
                                        class="img-fluid rounded shadow mb-3"
                                        style="max-height:120px;">

                                @endif

                                <input
                                    type="file"
                                    name="site_logo"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="card shadow-sm mb-4">

                            <div class="card-body text-center">

                                <h5>Profile Image</h5>

                                @if($setting && $setting->profile_image)

                                    <img
                                        src="{{ Storage::url($setting->profile_image) }}"
                                        class="rounded-circle shadow mb-3"
                                        style="width:180px;height:180px;object-fit:cover;">

                                @endif

                                <input
                                    type="file"
                                    name="profile_image"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="card shadow-sm">

                            <div class="card-body">

                                <h5>Resume</h5>

                                @if($setting && $setting->resume)

                                    <a
                                        href="{{ Storage::url($setting->resume) }}"
                                        target="_blank"
                                        class="btn btn-success w-100 mb-3">

                                        View Resume

                                    </a>

                                @endif

                                <input
                                    type="file"
                                    name="resume"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer bg-light text-end">

                <button class="btn btn-primary btn-lg px-5">

                    Save Settings

                </button>

            </div>

        </div>

    </form>

</div>

@endsection