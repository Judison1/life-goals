<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['file_path','attachable_id','attachable_type'];

    /**
     * The attachment belongs to an attachable
     */
    public function attachable()
    {
        return $this->morphTo();
    }

    public function getFilenameAttribute()
    {
        return Str::afterLast($this->file_path,'/');
    }

    public function getFiletypeAttribute ()
    {
        return mime_content_type(Storage::path("public/$this->file_path"));
    }

    public function getIsImageAttribute()
    {
        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];
        return in_array($this->filetype, $allowedMimeTypes);
    }

    public function getLinkAttribute()
    {
        return asset('storage/'.$this->file_path);
    }
}
