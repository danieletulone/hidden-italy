<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableActionButton extends Component
{

    /**
     * The name of resource.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public $resource;

    /**
     * The instance to pass to routes.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var [type]
     */
    public $istance;

    /**
     * Create a new component instance.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct($resource, $istance)
    {
        $this->resource = $resource;
        $this->istance = $istance;
    }

    public function render()
    {
        //
    }
}
