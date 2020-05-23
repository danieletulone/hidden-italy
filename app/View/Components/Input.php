<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * The input type.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var string
     */
    public $type;

    /**
     * The placeholder value.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public $placeholder;

    /**
     * Undocumented variable
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public $name;

    /**
     * The input name
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @var string
     */
    public $value;

    /**
     * Create a new component instance.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function __construct(
        string $placeholder, 
        string $name,
        string $type = 'text', 
        string $value = null
    ) {
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
