<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galley_Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'gallery_id',
        'image',
        'status'
    ];
}
