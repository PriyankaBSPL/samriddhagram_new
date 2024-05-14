<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubeLink extends Model
{
    use HasFactory;
    protected $table = 'youtube_links';

    protected $fillable =
    [
        'title',
        'youtube_link',
    ];
}
