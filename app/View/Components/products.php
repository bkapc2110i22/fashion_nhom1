<?php

namespace App\View\Components;

use Illuminate\View\Component;

class products extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;
    public $cats;

    public function __construct($data, $datas)
    {
        $this->products = $data;
        $this->cats = $datas;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.products');
    }
}
