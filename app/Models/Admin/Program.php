<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';

    protected $fillable =
    [
        'sector_type',
        'page_title',
        'design_type',
        'full_description',
        'top_description',
        'side_description',
        'image',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'page_title', 'id');
    }
}
