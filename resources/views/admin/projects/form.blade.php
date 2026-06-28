@csrf

<div class="mb-3">
    <label class="form-label">Title <span class="text-danger">*</span></label>
    <input
        type="text"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $project->title ?? '') }}"
        placeholder="Enter Project Title">

    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Technology</label>
    <input
        type="text"
        name="technology"
        class="form-control @error('technology') is-invalid @enderror"
        value="{{ old('technology', $project->technology ?? '') }}"
        placeholder="Laravel, PHP, Bootstrap, MySQL">

    @error('technology')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description <span class="text-danger">*</span></label>

    <textarea
        name="description"
        rows="6"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Project Description">{{ old('description', $project->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">GitHub Link</label>

    <input
        type="url"
        name="github_link"
        class="form-control @error('github_link') is-invalid @enderror"
        value="{{ old('github_link', $project->github_link ?? '') }}"
        placeholder="https://github.com/username/project">

    @error('github_link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Live Demo Link</label>

    <input
        type="url"
        name="live_link"
        class="form-control @error('live_link') is-invalid @enderror"
        value="{{ old('live_link', $project->live_link ?? '') }}"
        placeholder="https://example.com">

    @error('live_link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Project Image</label>

    <input
        type="file"
        name="image"
        class="form-control @error('image') is-invalid @enderror"
        accept="image/*">

    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if(isset($project) && $project->image)
        <div class="mt-3">
            <img
                src="{{ asset('storage/'.$project->image) }}"
                alt="{{ $project->title }}"
                class="img-thumbnail"
                width="180">
        </div>
    @endif
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Save Project
    </button>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>