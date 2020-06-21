<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCounter extends Component
{

    /**
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public string $icon;

    /**
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public string $name;

    /**
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public int $count;

    /**
     * Create a new component instance.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct(string $icon, string $name, int $count)
    {
        $this->icon = $icon;
        $this->name = $name;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard-counter');
    }
}
