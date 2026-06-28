<div class="mb-3">

    <label class="form-label">

        Company Name

    </label>

    <input
        type="text"
        name="company"
        class="form-control @error('company') is-invalid @enderror"
        value="{{ old('company',$experience->company ?? '') }}"
        placeholder="Google">

    @error('company')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>


<div class="mb-3">

    <label class="form-label">

        Designation

    </label>

    <input
        type="text"
        name="designation"
        class="form-control @error('designation') is-invalid @enderror"
        value="{{ old('designation',$experience->designation ?? '') }}"
        placeholder="Laravel Developer">

    @error('designation')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>


<div class="mb-3">

    <label class="form-label">

        Duration

    </label>

    <input
        type="text"
        name="duration"
        class="form-control @error('duration') is-invalid @enderror"
        value="{{ old('duration',$experience->duration ?? '') }}"
        placeholder="Jan 2022 - Present">

    @error('duration')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>


<div class="mb-4">

    <label class="form-label">

        Description

    </label>

    <textarea
        rows="5"
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Write about your work experience...">{{ old('description',$experience->description ?? '') }}</textarea>

    @error('description')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>