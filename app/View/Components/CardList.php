<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\CardList as CardListModel;

class CardList extends Component
{
    public $title;
    public $cards;
    public $add;
    public $edit;
    public $remove;
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
        $this->add = route('dashboard::cards.create', ['id' => $cardList->id]);
        $this->edit = route('dashboard::card-lists.edit', $cardList);
        $this->remove = route('dashboard::card-lists.destroy', $cardList);
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
