<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;
    protected $table = 'training_programs';

    protected $fillable =
    [
        'startdate',
        'enddate',
        'title',
        'duration',
        'beneficiaries'
    ];
}
