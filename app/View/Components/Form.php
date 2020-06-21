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
    public string $action;

    /**
     * The form method.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var string
     */
    public string $method;

    /**
     * The enctype used for current form.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var string
     */
    public $enctype;

    /**
     * Text of submit button.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var [type]
     */
    public string $btnText;

    public bool $showButton;

    public string $id;

    /**
     * Create a new component instance.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct(
        string $action, 
        string $method = "POST", 
        $enctype = null, 
        string $btnText = 'add.default',
        bool $showButton = true,
        string $id = ''
    ) {
        $this->action = $action;
        $this->method = $method;
        $this->enctype = $enctype;
        $this->btnText = $btnText;
        $this->showButton = $showButton;
        $this->id = $id;
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
