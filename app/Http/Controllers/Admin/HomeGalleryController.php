<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\HomeGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Home Gallery";
        $home_gallery = HomeGallery::orderBy('created_at', 'desc')->get();
        return view('admin.home_gallery.home_gallery', ['home_galleries' => $home_gallery], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Home Gallery";
        return view('admin.home_gallery.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($validator->passes()) {

            $home_gallery = new HomeGallery();

            if (!is_dir('admin/upload/HomeGallery')) {
                mkdir('admin/upload/HomeGallery', 0777, TRUE);
            }

            $home_gallery->type = $request->type;

            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/admin/upload/HomeGallery'), $image);
                $home_gallery->image =  $image;
            }

            $result = $home_gallery->save();

            if ($result) {
                return redirect('admin/home_gallery')->with('success', 'Home gallery detail added successfully!');
            } else {
                return redirect('admin/home_gallery/create')->with('error', 'Home Gallery detail not added successfully!');
            }
        } else {
            return redirect()->route('home_gallery.create')->withInput()->withErrors($validator);
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
        $title = "Edit Home Gallery";
        $home_gallery = HomeGallery::find($id);
        return view('admin.home_gallery.edit', ['home_galleries' => $home_gallery], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($validator->passes()) {

            $home_gallery = HomeGallery::find($id);
            if (!$home_gallery) {
                return redirect('admin/home_gallery')->withError('Home Gallery detail not found.');
            }

            $home_gallery->type = $request->type;

            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/admin/upload/HomeGallery/'), $newimage);
                $imagedestination = public_path('/admin/upload/HomeGallery/') . $home_gallery->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $home_gallery->image =  $newimage;
            }

            $result = $home_gallery->save();

            if ($result) {
                return redirect('admin/home_gallery')->with('success', 'Home Gallery detail updated successfully!');
            } else {
                return redirect('admin/home_gallery/edit')->with('error', 'Home Gallery detail not updated successfully!');
            }
        } else {
            return redirect()->route('home_gallery.edit')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $home_gallery = HomeGallery::find($id);

        // dd($notification);
        if (!$home_gallery) {
            return redirect('admin/home_gallery')->withError('Home Gallery detail not found.');
        }

        $oldImagePath = public_path('/admin/upload/HomeGallery/') . $home_gallery->image;
        if (file_exists($oldImagePath) && is_file($oldImagePath)) {
            unlink($oldImagePath);
        }

        $result = $home_gallery->delete();

        if ($home_gallery) {
            return redirect('admin/home_gallery')->with('success', 'Home Gallery detail deleted successfully!');
        } else {
            return redirect('admin/home_gallery')->with('error', 'Home Gallery detail not deleted successfully!');
        }
    }
}
