<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    use HasFactory;

    protected $table = 'variation_options'; // đúng tên bảng trong DB
    protected $primaryKey = 'variation_option_id'; // KHÓA CHÍNH ĐÚNG
    public $incrementing = true; // vì auto-increment
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'value',
        'variation_id',
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id', 'variation_id');
    }
}
