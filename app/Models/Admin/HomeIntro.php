<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeIntro extends Model
{
    use HasFactory;

    protected $table = 'home_intros';

    protected $fillable =
    [
        'description',
        'left_image',
        'left_url',
        'right_image',
        'right_url',
    ];
}
