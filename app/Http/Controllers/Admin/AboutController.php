<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "About Page List";
        $about = About::orderBy('created_at', 'desc')->get();
        return view('admin.about.about', ['abouts' => $about], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add About Page";
        return view('admin.about.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'banner_description' => 'required',
            'side_description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $about = new About();

            if (!is_dir('admin/upload/About')) {
                mkdir('admin/upload/About', 0777, TRUE);
            }

            $about->banner_description = $request->banner_description;
            $about->side_description = $request->side_description;
            $about->description = $request->description;

            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/admin/upload/About'), $image);
                $about->image =  $image;
            }

            $result = $about->save();

            if ($result) {
                return redirect('admin/about')->with('success', 'About page detail added successfully!');
            } else {
                 return redirect('admin/about/create')->with('error', 'About page detail not added successfully!');
            }
        } else {
            return redirect()->route('about.create')->withInput()->withErrors($validator);
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
        $title = "Edit About Page";
        $about = About::find($id);
        return view('admin.about.edit', ['abouts' => $about], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'banner_description' => 'required',
            'side_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'description' => 'required',
        ]);

         if ($validator->passes()) {

            $about = About::find($id);
            if (!$about) {
                return redirect('admin/about')->withError('About page detail not found.');
            }

            $about->banner_description = $request->banner_description;
            $about->side_description = $request->side_description;
            $about->description = $request->description;

            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/admin/upload/About/'), $newimage);
                $imagedestination = public_path('/admin/upload/About/') . $about->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $about->image =  $newimage;
            }

            $result = $about->save();

            if ($result) {
                return redirect('admin/about')->with('success', 'About page detail updated successfully!');
            } else {
                return redirect('admin/about/edit')->with('error', 'About page detail not updated successfully!');
            }
        } else {
            return redirect()->route('about.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $about = About::find($id);

        // dd($notification);
        if (!$about) {
            return redirect('admin/about')->withError('About page detail not found.');
        }

        $OldImagePath = public_path('/admin/upload/About/') . $about->image;
        if (file_exists($OldImagePath) && is_file($OldImagePath)) {
            unlink($OldImagePath);
        }
       
        $result = $about->delete();

        if ($result) {
            return redirect('admin/about')->with('success', 'About page detail deleted successfully!');
        } else {
            return redirect('admin/about')->with('error', 'About page detail not deleted successfully!');
        }
    }
}
