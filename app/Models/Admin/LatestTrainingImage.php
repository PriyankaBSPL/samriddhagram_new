<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestTrainingImage extends Model
{
    use HasFactory;

    protected $table = 'latest_training_images';

    protected $fillable =
    [
        'main_image',
        'upper_image',
        'lower_image',
        'description',

    ];
}
