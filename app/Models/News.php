<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    //
    //
    use HasFactory;
    protected $table = 'news';


    protected $fillable = [
        'title',
        'cover_image',

    ];

    public function blocks()
    {
        return $this->hasMany(News_Blocks::class, 'news_id');
    }
}
