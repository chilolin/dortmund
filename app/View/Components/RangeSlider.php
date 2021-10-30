<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RangeSlider extends Component
{
    /**
     * 最小値
     *
     * @var string
     */
    public $min;

    /**
     * 最大値
     *
     * @var string
     */
    public $max;

    /**
     * 一歩
     *
     * @var string
     */
    public $step;

    /**
     * 変数名
     *
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @param  string  $min
     * @param  string  $max
     * @param  string  $step
     * @param  string  $name
     * @return void
     */
    public function __construct($min, $max, $step="1", $name)
    {
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.range-slider');
    }
}
