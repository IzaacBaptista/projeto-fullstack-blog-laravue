<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'article_id',
        'content_number',
        'content'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
