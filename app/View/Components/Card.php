<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Card as CardModel;

class Card extends Component
{
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CardModel $card)
    {
        $this->title = $card->title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
