<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['filepath', 'original_filename', 'filetype'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
