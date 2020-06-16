<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarButton extends Component
{

    /**
     * Route name.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public string $route;

    /**
     * Material font icon name.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public string $icon;

    /**
     * Create a new component instance.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct($route, $icon)
    {
        $this->route = $route;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar.sidebar-button');
    }
}
