<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'author', 'publication_date', 'description', 'genre', 'cover_image'];

    public function isImageAUrl()
    {
        return filter_var($this->cover_image, FILTER_VALIDATE_URL);
    }
}
