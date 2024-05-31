<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable =
    [
        'banner_description',
        'side_description',
        'image',
        'description',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
