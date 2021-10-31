<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Note;

class ScaleSelector extends Component
{
    private $scaleNotes = [
        "major" => ["C", "D", "E", "F", "G", "A", "B"],
        "hemitonicPentatonic" => ["C", "C#", "F", "G", "A#"],
        "okinawa" => ["C", "E", "F", "G", "B"],
        "folkSong" => ["C", "D#", "F", "G", "A#"],
        "anhemitonicPentatonic" => ["C", "D", "F", "G", "A#"],
        "pentatonic" => ["C", "D", "E", "G", "A"],
        "ritsu" => ["C", "D", "F", "G", "A"],
    ];

    public $scaleNames = [
        "major" => "長調",
        "hemitonicPentatonic" => "陰音階",
        "okinawa" => "沖縄音階",
        "folkSong" => "民謡音階",
        "anhemitonicPentatonic" => "陽音階",
        "pentatonic" => "ヨナ抜き音階",
        "ritsu" => "律音階",
    ];

    public $scaleNoteIds;

    public $notes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->notes = Note::whereBetween('id', [514, 636])->get();
        $this->scaleNoteIds = array_map(function ($scale) {
            return array_reduce($scale, function ($noteIds, $noteName) {
                return array_merge($noteIds, $this->selectNoteFromName($noteName));
            }, []);
        }, $this->scaleNotes);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.scale-selector');
    }

    /**
     * キー名からキーのIDを取得。
     * 例）キー名が "C" の時、　取得するキーIDは　”C5” と　”C6” のもの。
     *
     * @param string $noteName
     * @return array $noteIds
     */
    private function selectNoteFromName(string $noteName) {
        $noteIds = [];

        foreach ($this->notes as $note) {
            if (
                strpos($noteName, '#') === false &&
                is_int(strpos($note->name, $noteName)) &&
                strpos($note->name, '#') === false
            ) {
                array_push($noteIds, $note->id);
            } else if (
                is_int(strpos($noteName, '#')) &&
                is_int(strpos($note->name, $noteName))
            ) {
                array_push($noteIds, $note->id);
            }
        }

        return $noteIds;
    }
}
