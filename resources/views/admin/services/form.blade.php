<div class="mb-3">

    <label class="form-label">

        Title

    </label>

    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $service->title ?? '') }}">

    @error('title')
        <div class="invalid-feedback">

            {{ $message }}

        </div>
    @enderror

</div>


<div class="mb-3">

    <label class="form-label">

        Description

    </label>

    <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">

            {{ $message }}

        </div>
    @enderror

</div>


<div class="mb-4">

    <label class="form-label">

        Service Icon

    </label>

    <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror">

    @error('icon')
        <div class="invalid-feedback">

            {{ $message }}

        </div>
    @enderror

    @if (isset($service) && $service->icon)
        <div class="mt-3">
            <img src="{{ Storage::url($service->icon) }}" alt="{{ $service->title }}" width="120"
                class="img-thumbnail">
        </div>
    @endif

</div>
