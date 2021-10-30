<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChordSelector extends Component
{
    /**
     * ID
     *
     * @var string
     */
    public $id;

    /**
     * 変数名
     *
     * @var string
     */
    public $name;

    /**
     * コード一覧
     *
     * @var string
     */
    public $chords;

    /**
     * Create a new component instance.
     *
     * @param  string  $id
     * @param  string  $name
     * @param  string  $chords
     * @return void
     */
    public function __construct($id, $name, $chords)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chords = json_decode(htmlspecialchars_decode($chords));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.chord-selector');
    }
}
