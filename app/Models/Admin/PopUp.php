<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopUp extends Model
{
    use HasFactory;

    protected $table = 'pop_ups';

    protected $fillable =
    [
        'title',
        'design_type',
        'description',
        'image',

    ];
}
