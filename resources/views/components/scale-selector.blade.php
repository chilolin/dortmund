<div>
    <select id="scale-selector">
        @foreach($scaleNames as $scale => $japanese)
            <option value="{{ $scale }}">{{ $japanese }}</option>
        @endforeach
    </select>

    <div id="checkbox-wrapper">
        @foreach($keys as $key)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="keys[]"
                    id="key-{{ $key->id }}"
                    value="{{ $key->id }}"
                >
                <label class="form-check-label" for="keys1">
                    {{ $key->name }}
                </label>
            </div>
        @endforeach
    </div>

    <script type="text/javascript">
        {
            const scaleSelector = document.getElementById('scale-selector');
            const checkboxes = Array.from(document.getElementById('checkbox-wrapper').getElementsByClassName('form-check-input'));

            function handleChangeScale(event) {
                // チェックを全て外す。
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                })

                const scale = event.target.value;

                checkedKeys.forEach(function (keyId) {
                    const keyCheckBox = document.getElementById(keyId);
                    keyCheckBox.checked = true;
                })
            }

            function selectScale(scale) {
                const scales = {
                    'major': [52, 54, 56, 57]
                }
            }

            scaleSelector.addEventListener('change', handleChangeScale)
        }
    </script>
</div>
