<?php
    $jsonScaleKeyIds = json_encode($scaleKeyIds);
?>

<div>
    <select class='form-select p-1'　id="scale-selector">
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
                    @if (array_search($key->id, $scaleKeyIds['major']) !== false)
                        checked
                    @endif
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

                // 選択されたスケールのキーにチェックをつける。
                const scale = event.target.value;
                const checkingKeyIds = getCheckingKeyIds(scale);
                checkingKeyIds.forEach(function (keyId) {
                    const checkingBox = document.getElementById(keyId);
                    checkingBox.checked = true;
                })
            }

            const scaleKeyIds = JSON.parse('<?php echo $jsonScaleKeyIds?>');
            function getCheckingKeyIds(scale) {
                return scaleKeyIds[scale].map(function (id) {
                    return 'key-' + id;
                })
            }

            scaleSelector.addEventListener('change', handleChangeScale);
        }
    </script>
</div>
