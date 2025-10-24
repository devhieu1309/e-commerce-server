<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
        'description',
        'created_at',
        'updated_at'
    ];

    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class, 'category_id', 'category_id');
    }
}
