<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\HomeIntro;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeIntroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Home Intro";
        $home_intro = HomeIntro::orderBy('created_at', 'desc')->get();
        return view('admin.home_intro.home_intro', ['home_intros' => $home_intro], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Home Intro";
        return view('admin.home_intro.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'left_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'left_url' => 'required|url',
            'right_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'right_url' => 'required|url',
        ]);

        if ($validator->passes()) {

            $home_intro = new HomeIntro();

            if (!is_dir('admin/upload/HomeIntro/LeftImage')) {
                mkdir('admin/upload/HomeIntro/LeftImage', 0777, TRUE);
            }

            if (!is_dir('admin/upload/HomeIntro/RightImage')) {
                mkdir('admin/upload/HomeIntro/RightImage', 0777, TRUE);
            }

            $home_intro->description = $request->description;
            $home_intro->left_url = $request->left_url;
            $home_intro->right_url = $request->right_url;

            if (isset($request->left_image)) {
                $left_image = time() . '.' . $request->left_image->getClientOriginalExtension();
                $request->left_image->move(public_path('/admin/upload/HomeIntro/LeftImage'), $left_image);
                $home_intro->left_image =  $left_image;
            }

            if (isset($request->right_image)) {
                $right_image = time() . '.' . $request->right_image->getClientOriginalExtension();
                $request->right_image->move(public_path('/admin/upload/HomeIntro/RightImage'), $right_image);
                $home_intro->right_image =  $right_image;
            }

            $result = $home_intro->save();

            if ($result) {
                return redirect('home_intro')->with('success', 'Home intro detail added successfully!');
            } else {
                return redirect('home_intro/create')->with('error', 'Home intro detail not added successfully!');
            }
        } else {
            return redirect()->route('home_intro.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Edit Home Intro";
        $home_intro = HomeIntro::find($id);
        return view('admin.home_intro.edit', ['home_intros' => $home_intro], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'left_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'left_url' => 'required|url',
            'right_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'right_url' => 'required|url',
        ]);

        if ($validator->passes()) {

            $home_intro = HomeIntro::find($id);
            if (!$home_intro) {
                return redirect('home_intro')->withError('Home Intro detail not found.');
            }

            $home_intro->description = $request->description;
            $home_intro->left_url = $request->left_url;
            $home_intro->right_url = $request->right_url;

            if (isset($request->left_image)) {
                $newleftimage = time() . '.' . $request->left_image->extension();
                $request->left_image->move(public_path('/admin/upload/HomeIntro/LeftImage'), $newleftimage);
                $leftimagedestination = public_path('/admin/upload/HomeIntro/LeftImage') . $home_intro->left_image;
                if (file_exists($leftimagedestination) && is_file($leftimagedestination)) {
                    unlink($leftimagedestination);
                }
                $home_intro->left_image =  $newleftimage;
            }

            if (isset($request->right_image)) {
                $newrightimage = time() . '.' . $request->right_image->extension();
                $request->right_image->move(public_path('/admin/upload/HomeIntro/RightImage'), $newrightimage);
                $rightimagedestination = public_path('/admin/upload/HomeIntro/RightImage') . $home_intro->right_image;
                if (file_exists($rightimagedestination) && is_file($rightimagedestination)) {
                    unlink($rightimagedestination);
                }
                $home_intro->right_image =  $newrightimage;
            }

            $result = $home_intro->save();

            if ($result) {
                return redirect('home_intro')->with('success', 'Home Intro detail updated successfully!');
            } else {
                return redirect('home_intro/edit')->with('error', 'Home Intro detail not updated successfully!');
            }
        } else {
            return redirect()->route('home_intro.edit')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $home_intro = HomeIntro::find($id);

        // dd($notification);
        if (!$home_intro) {
            return redirect('home_intro')->withError('Home Intro detail not found.');
        }

        $OldLeftImagePath = public_path('/admin/upload/HomeIntro/LeftImage') . $home_intro->left_image;
        if (file_exists($OldLeftImagePath) && is_file($OldLeftImagePath)) {
            unlink($OldLeftImagePath);
        }

        $OldRightImagePath = public_path('/admin/upload/HomeIntro/RightImage') . $home_intro->right_image;
        if (file_exists($OldRightImagePath) && is_file($OldRightImagePath)) {
            unlink($OldRightImagePath);
        }

        $result = $home_intro->delete();

        if ($home_intro) {
            return redirect('home_intro')->with('success', 'Home Intro detail deleted successfully!');
        } else {
            return redirect('home_intro')->with('error', 'Home Intro detail not deleted successfully!');
        }
    }
}
