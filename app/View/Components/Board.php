<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Board as BordModel;

class Board extends Component
{
    public $title;
    public $link;
    public $created_at;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BordModel $board)
    {
        $this->title = $board->title;
        $this->created_at = $board->created_at;
        $this->link = route('dashboard::boards.show', $board);
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
