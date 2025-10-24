<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoReview extends Model
{
    /** @use HasFactory<\Database\Factories\VideoReviewFactory> */
    use HasFactory;

    protected $table = 'video_reviews';

    protected $primaryKey = 'video_id';

    protected $fillable = [
        'product_id',
        'title',
        'url',
        'is_visible',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
