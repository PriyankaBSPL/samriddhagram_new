<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestTraining extends Model
{
    use HasFactory;
    protected $table = 'latest_trainings';

    protected $fillable =
    [
        'description',
    ];
}
