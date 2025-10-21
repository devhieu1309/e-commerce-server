<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';
    protected $primaryKey = 'variation_id';
    protected $fillable = [
        'variation_name',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'variation_id');
    }
}
