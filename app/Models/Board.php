<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Board extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = ['title'];

    /**
     * The board has a user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
