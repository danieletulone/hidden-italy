<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterDropdownItem extends Component
{

    public string $value;

    public array $params;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $params)
    {
        $this->value = $value;
        $this->params = $params;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.filter-dropdown-item');
    }
}
