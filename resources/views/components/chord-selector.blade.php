<div class="col">
    <label for="{{ $id }}" class="form-label">Choose a {{ $id }}:</label>
    <select class="form-select" name="{{ $name }}" id="{{ $id }}" required>
        <option selected disabled value="">--Please choose an option--</option>
        @foreach ($chords as $chord)
                <option
                    value="{{ $chord->id }}"
                    @if (old($name) == $chord->id)
                        selected
                    @endif
                >
                    {{ $chord->name }}
                </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">必ず指定してください。</div>
    @enderror
</div>
