<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'cat_id',
        'image',
        'title',
        'status',
    ];
}
