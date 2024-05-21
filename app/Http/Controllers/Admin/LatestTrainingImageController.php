<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\LatestTrainingImage;
use Illuminate\Support\Facades\Validator;


class LatestTrainingImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Latest Training Image";
        $latest_training_image = LatestTrainingImage::orderBy('created_at', 'desc')->get();
        return view('admin.latest_training_image.latest_training_image', ['latest_training_images' => $latest_training_image], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        $title = "Add Latest Training Image";
        return view('admin.latest_training_image.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'main_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'upper_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'lower_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $latest_training_image = new LatestTrainingImage();

            if (!is_dir('admin/upload/LatestTrainingImage/MainImage')) {
                mkdir('admin/upload/LatestTrainingImage/MainImage', 0777, TRUE);
            }

            if (!is_dir('admin/upload/LatestTrainingImage/UpperImage')) {
                mkdir('admin/upload/LatestTrainingImage/UpperImage', 0777, TRUE);
            }

            if (!is_dir('admin/upload/LatestTrainingImage/LowerImage')) {
                mkdir('admin/upload/LatestTrainingImage/LowerImage', 0777, TRUE);
            }

            $latest_training_image->description = $request->description;

            if (isset($request->main_image)) {
                $main_image = 'main_' . time() . '.' . $request->main_image->getClientOriginalExtension();
                $request->main_image->move(public_path('/admin/upload/LatestTrainingImage/MainImage'), $main_image);
                $latest_training_image->main_image =  $main_image;
            }

            if (isset($request->upper_image)) {
                $upper_image = 'upper_' . time() . '.' . $request->upper_image->getClientOriginalExtension();
                $request->upper_image->move(public_path('/admin/upload/LatestTrainingImage/UpperImage'), $upper_image);
                $latest_training_image->upper_image =  $upper_image;
            }

            if (isset($request->lower_image)) {
                $lower_image = 'lower_' . time() . '.' . $request->lower_image->getClientOriginalExtension();
                $request->lower_image->move(public_path('/admin/upload/LatestTrainingImage/LowerImage'), $lower_image);
                $latest_training_image->lower_image =  $lower_image;
            }

            $result = $latest_training_image->save();

            if ($result) {
                return redirect('admin/latest_training_image')->with('success', 'Latest training image detail added successfully!');
            } else {
                return redirect('admin/latest_training_image/create')->with('error', 'Latest training image detail not added successfully!');
            }
        } else {
            return redirect()->route('latest_training_image.create')->withInput()->withErrors($validator);
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
        $title = "Edit Latest Training Image";
        $latest_training_image = LatestTrainingImage::find($id);
        return view('admin.latest_training_image.edit', ['latest_training_images' => $latest_training_image], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'upper_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'lower_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'description' => 'required',
        ]);

         if ($validator->passes()) {

            $latest_training_image = LatestTrainingImage::find($id);
            if (!$latest_training_image) {
                return redirect('admin/latest_training_image')->withError('Latest training image detail not found.');
            }

            $latest_training_image->description = $request->description;

            if (isset($request->main_image)) {
                $newmainimage = 'main_' . time() . '.' . $request->main_image->extension();
                $request->main_image->move(public_path('/admin/upload/LatestTrainingImage/MainImage/'), $newmainimage);
                $mainimagedestination = public_path('/admin/upload/LatestTrainingImage/MainImage/') . $latest_training_image->main_image;
                if (file_exists($mainimagedestination) && is_file($mainimagedestination)) {
                    unlink($mainimagedestination);
                }
                $latest_training_image->main_image =  $newmainimage;
            }

            if (isset($request->upper_image)) {
                $newupperimage = 'upper_' . time() . '.' . $request->upper_image->extension();
                $request->upper_image->move(public_path('/admin/upload/LatestTrainingImage/UpperImage/'), $newupperimage);
                $upperimagedestination = public_path('/admin/upload/LatestTrainingImage/UpperImage/') . $latest_training_image->upper_image;
                if (file_exists($upperimagedestination) && is_file($upperimagedestination)) {
                    unlink($upperimagedestination);
                }
                $latest_training_image->upper_image =  $newupperimage;
            }

            if (isset($request->lower_image)) {
                $newlowerimage = 'lower_' . time() . '.' . $request->lower_image->extension();
                $request->lower_image->move(public_path('/admin/upload/LatestTrainingImage/LowerImage/'), $newlowerimage);
                $lowerimagedestination = public_path('/admin/upload/LatestTrainingImage/LowerImage/') . $latest_training_image->lower_image;
                if (file_exists($lowerimagedestination) && is_file($lowerimagedestination)) {
                    unlink($lowerimagedestination);
                }
                $latest_training_image->lower_image =  $newlowerimage;
            }

            $result = $latest_training_image->save();

            if ($result) {
                return redirect('admin/latest_training_image')->with('success', 'Latest training image detail updated successfully!');
            } else {
                return redirect('admin/latest_training_image/edit')->with('error', 'Latest training image detail not updated successfully!');
            }
        } else {
            return redirect()->route('latest_training_image.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $latest_training_image = LatestTrainingImage::find($id);

        // dd($notification);
        if (!$latest_training_image) {
            return redirect('admin/latest_training_image')->withError('Latest training image detail not found.');
        }

        $OldMainImagePath = public_path('/admin/upload/LatestTrainingImage/MainImage/') . $latest_training_image->main_image;
        if (file_exists($OldMainImagePath) && is_file($OldMainImagePath)) {
            unlink($OldMainImagePath);
        }

        $OldUpperImagePath = public_path('/admin/upload/LatestTrainingImage/UpperImage/') . $latest_training_image->upper_image;
        if (file_exists($OldUpperImagePath) && is_file($OldUpperImagePath)) {
            unlink($OldUpperImagePath);
        }

        $OldLowerImagePath = public_path('/admin/upload/LatestTrainingImage/LowerImage/') . $latest_training_image->lower_image;
        if (file_exists($OldLowerImagePath) && is_file($OldLowerImagePath)) {
            unlink($OldLowerImagePath);
        }
       
        $result = $latest_training_image->delete();

        if ($result) {
            return redirect('admin/latest_training_image')->with('success', 'Latest training image detail deleted successfully!');
        } else {
            return redirect('admin/latest_training_image')->with('error', 'Latest training image detail not deleted successfully!');
        }

    }
}
