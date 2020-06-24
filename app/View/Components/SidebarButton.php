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
     * The section name.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public string $name;

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
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct($route, $icon, $name = '', $visible = true)
    {
        $this->route = $route;
        $this->icon  = $icon;
        $this->name  = $name;
        $this->visible = $visible;
    }

    /**
     * Get the view / contents that represent the component.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar.sidebar-button');
    }
}
