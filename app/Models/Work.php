<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "path_img",
        "score",
        "category_id", 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }      
    
}
