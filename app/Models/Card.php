<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    /**
     * The card belongs to a card list
     */
    public function cardList()
    {
        return $this->belongsTo('App\Models\CardList');
    }

    /**
     * The card has many tags
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    /**
     * The card has many attachments
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable');
    }
}
