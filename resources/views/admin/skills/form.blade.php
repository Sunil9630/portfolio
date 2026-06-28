<div class="mb-4">

    <label class="form-label">

        Skill Name

    </label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name',$skill->name ?? '') }}"
        placeholder="Laravel">

    @error('name')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>

<div class="mb-4">

    <label class="form-label">

        Skill Percentage

    </label>

    <div class="input-group">

        <input
            type="number"
            min="0"
            max="100"
            name="percentage"
            class="form-control @error('percentage') is-invalid @enderror"
            value="{{ old('percentage',$skill->percentage ?? '') }}"
            placeholder="90">

        <span class="input-group-text">%</span>

        @error('percentage')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>