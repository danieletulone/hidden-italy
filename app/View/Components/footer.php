<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{

    public string $textColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $textColor = 'text-dark')
    {
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
