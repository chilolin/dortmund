<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Chord;

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
     * @return void
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chords = Chord::all();
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
