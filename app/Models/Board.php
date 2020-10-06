<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['title','user_id'];

    /**
     * The board belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The board has many card lists
     */
    public function cardLists()
    {
        return $this->hasMany('App\Models\CardList');
    }
}
