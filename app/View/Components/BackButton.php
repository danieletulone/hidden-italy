<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackButton extends Component
{

    public $goTo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($goTo = null)
    {
        if ($goTo) {
            $this->goTo = $goTo;
        } else {
            $this->goTo = explode('.' ,request()->route()->getName())[0] . '.index';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.back-button');
    }
}
