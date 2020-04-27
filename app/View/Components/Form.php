<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * The form action.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public $action;

    /**
     * The form method.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var string
     */
    public $method;

    /**
     * Create a new component instance.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct($action, $method = "POST")
    {
        $this->action = $action;
        $this->method = $method;
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
        return view('components.form');
    }
}
