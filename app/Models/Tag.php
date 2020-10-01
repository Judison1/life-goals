<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    /**
     * The tag belongs to many cards
     */
    public function cards()
    {
        return $this->morphedByMany('App\Models\Card', 'taggable');
    }
}
