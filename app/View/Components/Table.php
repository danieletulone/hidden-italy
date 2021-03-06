<?php

namespace App\View\Components;

use App\Helpers\TableHelper;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Items with paginator.
     *
     * @var array
     */
    public $items;

    /**
     * Headers of table.
     *
     * @var array
     */
    public $headers;

    /**
     * Items to show into table.
     *
     * @var [type]
     */
    public $itemsData;

    /**
     * 
     */
    public $resource;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $resource)
    {
        $this->items     = $items;
        $this->itemsData = TableHelper::getData($items);
        $this->headers   = TableHelper::getHeaders($items);
        $this->resource  = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table');
    }
}
