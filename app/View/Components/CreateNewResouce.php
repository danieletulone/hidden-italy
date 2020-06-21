<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateNewResource extends Component
{

    public string $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.create-new-resource');
    }
}
