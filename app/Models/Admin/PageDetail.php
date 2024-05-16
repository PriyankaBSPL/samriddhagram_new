<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    use HasFactory;
    protected $table = 'page_details';

    protected $fillable =
    [
        'page_title',
    ];
}
