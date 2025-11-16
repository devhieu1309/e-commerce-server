<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    //
    protected $table = "comments";
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'fullname',
        'email',
        'content',
        'news_id',
        'user_id'
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id ', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id ', 'user_id');
    }
}
