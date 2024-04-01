<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'name',
        'surname',
        'about',
        'image',
        'linkedin',
        'github',
        'instagram',
        'contact'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_author', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
}
