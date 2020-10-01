<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'card_list_id',
    ];

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
}
