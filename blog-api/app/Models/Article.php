<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'id_author',
        'data',
        'time_read',
        'title',
        'content',
        'blockquote',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'id_author', 'id');
    }
}
