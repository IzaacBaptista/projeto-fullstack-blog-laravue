<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id_category',
        'id_author',
        'data',
        'time_read',
        'title',
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

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_article', 'id');
    }

    public function references()
    {
        return $this->hasMany(Reference::class, 'article_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class, 'article_id', 'id');
    }
}
