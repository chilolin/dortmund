<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Key;

class ScaleSelector extends Component
{
    private $scaleKeys = [
        "major" => ["C", "D", "E", "F", "G", "A", "B"],
        "hemitonicPentatonic" => ["C", "C#", "F", "G", "B"],
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

    public $scaleKeyIds;

    public $keys;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->keys = Key::whereBetween('id', [52, 64])->get();
        $this->scaleKeyIds = array_map(function ($scale) {
            return array_reduce($scale, function ($keyIds, $keyName) {
                return array_merge($keyIds, $this->selectKeyFromName($keyName));
            }, []);
        }, $this->scaleKeys);
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
     * @param string $keyName
     * @return array $keyIds
     */
    private function selectKeyFromName(string $keyName) {
        $keyIds = [];

        foreach ($this->keys as $key) {
            if (
                strpos($keyName, '#') === false &&
                is_int(strpos($key->name, $keyName)) &&
                strpos($key->name, '#') === false
            ) {
                array_push($keyIds, $key->id);
            } else if (
                is_int(strpos($keyName, '#')) &&
                is_int(strpos($key->name, $keyName))
            ) {
                array_push($keyIds, $key->id);
            }
        }

        return $keyIds;
    }
}
