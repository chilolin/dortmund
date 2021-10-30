<div>
    <span id="{{ $name }}-rs-bullet">{{ $name }}</span>
    <input
        type="range"
        class="form-control-range"
        min="{{ $min }}"
        max="{{ $max }}"
        value="{{ $min }}"
        step="{{ $step }}"
        id="{{ $name }}-rs-line"
        name="{{ $name }}"
    >
</div>
