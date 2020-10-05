<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\CardList as CardListModel;

class CardList extends Component
{
    public $id;
    public $title;
    public $cards;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CardListModel $cardList)
    {
        $this->id = $cardList->id;
        $this->title = $cardList->title;
        $this->cards = $cardList->cards;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-list');
    }
}
