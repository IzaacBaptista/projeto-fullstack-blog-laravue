<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'image',
        'linkedin',
        'github',
        'instagram'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_author', 'id');
    }
}
