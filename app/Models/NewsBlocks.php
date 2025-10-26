<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsBlocks extends Model
{
    //
    use HasFactory;

    protected $table = 'news_blocks';

    protected $fillable = [
        'title',
        'content',
        'image',
        'position',
        'news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
}
