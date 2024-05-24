<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatePage extends Model
{
    use HasFactory;

    protected $table = 'state_pages';

    protected $fillable =
    [
        'state_name',
        'number_of_training',
        'number_of_trainee',
        'url',
    ];
}
