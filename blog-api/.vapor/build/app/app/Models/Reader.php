<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    
    protected $table = 'readers';
    protected $fillable = [
        'id_user',
        'name',
        'surname',
        'about',
        'image',
        'linkedin',
        'github',
        'instagram',
        'email',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
