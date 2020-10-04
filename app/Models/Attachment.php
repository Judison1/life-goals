<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    /**
     * The attachment belongs to an attachable
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
