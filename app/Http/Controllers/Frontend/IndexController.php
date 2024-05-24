<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\HomeIntro;
use App\Models\Admin\HomeBanner;
use App\Models\Admin\HomeGallery;
use App\Http\Controllers\Controller;
use App\Models\Admin\LatestTraining;
use App\Models\Admin\TrainingProgram;
use App\Models\Admin\ProgramAndTraining;
use App\Models\Admin\LatestTrainingImage;

class IndexController extends Controller
{
    //
    public function index()
    {
        $home_banners = HomeBanner::all();
        $home_intros = HomeIntro::orderBy('id', 'DESC')->get();

        $currentMonthStart = date('Y-m-01');
        $currentMonthEnd = date('Y-m-t');

        // Fetch training programs within the current month and order by ID
        $trainings = TrainingProgram::whereBetween('startdate', [$currentMonthStart, $currentMonthEnd])->get();
        $latest_trainings = LatestTraining::orderBy('id', 'DESC')->get();
        $latest_training_images = LatestTrainingImage::all();
        $program_and_trainings = ProgramAndTraining::orderBy('id', 'DESC')->get();
        $home_gallerys = HomeGallery::where('type', 1)->orderBy('id', 'DESC')->get();
        $partners = HomeGallery::where('type', 2)->orderBy('id', 'DESC')->get();

        return view('frontend/index', compact(
            'home_banners',
            'home_intros',
            'trainings',
            'latest_trainings',
            'program_and_trainings',
            'latest_training_images',
            'home_gallerys',
            'partners',
        ));
    }
}
