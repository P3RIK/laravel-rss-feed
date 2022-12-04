<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FeedEntry extends Component
{
    public $entry;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($entry)
    {
        $this->entry = $entry;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feed-entry');
    }
}
