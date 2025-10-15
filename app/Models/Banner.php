<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    //
    use HasFactory;
    protected $table = 'banner';


    protected $fillable = [
        'title',
        'image',
        'link_url',
        'position',
        'is_active'
    ];
}
