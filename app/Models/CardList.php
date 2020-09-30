<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'board_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = ['title'];

    /**
     * The card list belongs to a board
     */
    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }

    /**
     * The card list has many cards
     */
    public function cards()
    {
        return $this->hasMany('App\Models\Card');
    }
}
