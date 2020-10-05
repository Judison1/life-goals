<?php

namespace App\View\Components;

use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\View\Component;

use App\Models\Card as CardModel;

class Card extends Component
{
    public $title;
    public $description;
    public $open;
    public $edit;
    public $remove;
    public $card_img;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CardModel $card)
    {
        $this->title = $card->title;
        $this->description = Str::limit($card->description, 150);
        $this->open = route('dashboard::cards.show', $card);
        $this->edit = route('dashboard::cards.edit', $card);
        $this->remove = route('dashboard::cards.destroy', $card);
        $this->card_img = $this->getCardImage($card->attachments);
    }

    private function getCardImage($attachments)
    {
        foreach ($attachments as $attachment) {
            if ($attachment->is_image)
                return $attachment->link;
        }
        return null;
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
