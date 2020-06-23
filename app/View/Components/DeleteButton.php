<?php

namespace App\View\Components;

class DeleteButton extends TableActionButton
{

    /**
     * Get the view / contents that represent the component.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.delete-button');
    }
}
