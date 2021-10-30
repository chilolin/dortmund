<div>
    <span id="{{ $name }}-rs-bullet">{{ $min }}</span>
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

    <script type="text/javascript">
        {
            const rangeSlider = document.getElementById("{{ $name }}-rs-line");
            const rangeBullet = document.getElementById("{{ $name }}-rs-bullet");

            function showSliderValue() {
                rangeBullet.innerHTML = rangeSlider.value;
                console.log(rangeSlider.value)
                const bulletPosition = (rangeSlider.value / rangeSlider.max);
                rangeBullet.style.left = (bulletPosition * 578) + "px";
            }

            rangeSlider.addEventListener("input", showSliderValue, false);
        }
    </script>
</div>
