<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'id',
        'slug',
        'title',
        'parent_id',
        'banner_image',
        'position',
        'status'
    ];

}
