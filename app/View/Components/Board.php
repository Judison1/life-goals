<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Board extends Component
{
    public $title;
    public $created_at;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($board)
    {
        $this->title = $board->title;
        $this->created_at = $board->created_at;

    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.board');
    }
}
