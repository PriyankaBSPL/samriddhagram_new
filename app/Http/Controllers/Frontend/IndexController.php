<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\HomeIntro;
use App\Models\Admin\HomeBanner;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        $home_banners = HomeBanner::all();
        $home_intros = HomeIntro::orderBy('id','DESC')->get();
        return view('frontend/index', compact('home_banners','home_intros'));
    }
}
