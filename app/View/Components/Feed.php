<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Feed extends Component
{
    public $entries;
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($entries, $categories)
    {
        $this->entries = $entries;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feed');
    }
}
