<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comments';
    protected $fillable = [
        'id_article',
        'id_user',
        'name',
        'email',
        'comment'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'id_author', 'id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
