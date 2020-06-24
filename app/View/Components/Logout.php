<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logout extends Component
{
    /**
     * Indicates if button name can be visible.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var bool
     */
    public bool $visible;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($visible = true)
    {
        $this->visible = $visible;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.logout');
    }
}
