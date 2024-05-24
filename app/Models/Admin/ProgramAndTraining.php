<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAndTraining extends Model
{
    use HasFactory;

    protected $table = 'program_and_trainings';

    protected $fillable =
    [
        'title',
        'image',
    ];
}
