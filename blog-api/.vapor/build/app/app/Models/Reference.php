<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $table = 'references';

    protected $fillable = [
        'article_id',
        'reference_number',
        'reference'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
