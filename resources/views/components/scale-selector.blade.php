<?php
    $jsonScaleNoteIds = json_encode($scaleNoteIds);
?>

<div>
    <select id="scale-selector" class="form-select p-1">
        @foreach($scaleNames as $scale => $japanese)
            <option value="{{ $scale }}">{{ $japanese }}</option>
        @endforeach
    </select>

    <div id="checkbox-wrapper">
        @foreach($notes as $note)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="notes[]"
                    id="note-{{ $note->id }}"
                    value="{{ $note->id }}"
                    @if (array_search($note->id, $scaleNoteIds['major']) !== false)
                        checked
                    @endif
                >
                <label class="form-check-label" for="notes1">
                    {{ $note->name }}
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
                const checkingNoteIds = getCheckingNoteIds(scale);
                checkingNoteIds.forEach(function (noteId) {
                    const checkingBox = document.getElementById(noteId);
                    checkingBox.checked = true;
                })
            }

            const scaleNoteIds = JSON.parse('<?php echo $jsonScaleNoteIds?>');
            function getCheckingNoteIds(scale) {
                return scaleNoteIds[scale].map(function (id) {
                    return 'note-' + id;
                })
            }

            scaleSelector.addEventListener('change', handleChangeScale);
        }
    </script>
</div>
