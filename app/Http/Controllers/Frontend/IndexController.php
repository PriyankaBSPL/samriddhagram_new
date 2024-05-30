<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\ContactMail;
use App\Models\Admin\About;
use Illuminate\Http\Request;
use App\Models\Admin\ContactUs;
use App\Models\Admin\HomeIntro;
use App\Models\Admin\HomeBanner;
use App\Models\Admin\HomeGallery;
use App\Models\Admin\YoutubeLink;
use App\Http\Controllers\Controller;
use App\Models\Admin\LatestTraining;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\TrainingProgram;
use App\Models\Admin\ProgramAndTraining;
use App\Models\Admin\LatestTrainingImage;
use App\Models\Admin\Program;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryImage;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryImage;
use App\Models\Admin\Menu;
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
        $youtubes = YoutubeLink::orderBy('id', 'DESC')->get();

        return view('frontend/index', compact(
            'home_banners',
            'home_intros',
            'trainings',
            'latest_trainings',
            'program_and_trainings',
            'latest_training_images',
            'home_gallerys',
            'partners',
            'youtubes'
        ));
    }

    public function about()
    {
        $abouts = About::all();
        return view('frontend.about-us', compact('abouts'));
    }

    public function program($slug,$id)
    {
        // $programs = Program::where('page_title',$id)->get();
        $programs = Program::with('menu')->where('page_title', $id)->get();
        return view('frontend.description', compact('programs'));
    }
    public function category($slug,$id)
    {
        $data = Menu::where('id', $id)->first();
        $title=$data->title;
        $gallery = Category::where('type', $id)->get();
        return view('frontend.category', compact('gallery','title'));
    }
    public function gallery($id)
    {
    
        $data = Gallery::where('cat_img_id', $id)->get();
        $title='test';
        return view('frontend.gallery', compact('data','title'));
    }

    public function agro_entrepreneurship_training_program()
    {
        return view('frontend.agro-entrepreneurship-training-program');
    }


    public function contact_us()
    {
        return view('frontend.contact-us');
    }

    public function contactsave(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,10',
            'msg' => 'required'
        ], [
            'msg.required' => 'The message field is required.'
        ]);

        // Creating a new contact record
        $contact = new ContactUs();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->msg = $validatedData['msg'];
        $contact->save();

        
        // Sending an email
        $recipient = "zalapriyanka1997@gmail.com";
        Mail::to($recipient)->send(new ContactMail(
            $validatedData['name'],
            $validatedData['email'],
            $validatedData['phone'],
            $validatedData['msg']
        ));

        $msg = 'Your contact detail have been saved successfully.';

        return back()->with('success', $msg);
    }

}
