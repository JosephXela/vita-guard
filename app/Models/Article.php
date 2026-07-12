<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'article_name',
        'content',
        'doctor_id',
        'image'
    ];

    protected $dates = ['created_at', 'updated_at'];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'articles';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class)->withTrashed();
    }
}
