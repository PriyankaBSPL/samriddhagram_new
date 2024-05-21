<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\HomeBanner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Home Banner";
        $home_banner = HomeBanner::orderBy('created_at', 'desc')->get();
        return view('admin.home_banner.home_banner', ['home_banners' => $home_banner], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Home Banner";
        return view('admin.home_banner.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
             'video' => 'required|file|mimes:mp4|max:32768',
        ]);

        if ($validator->passes()) {

            $home_banner = new HomeBanner();

            if (!is_dir('admin/upload/HomeBanner')) {
                mkdir('admin/upload/HomeBanner', 0777, TRUE);
            }

            if (isset($request->video)) {
                $newvideo = time() . '.' . $request->video->getClientOriginalExtension();
                $request->video->move(public_path('/admin/upload/HomeBanner'), $newvideo);
                $home_banner->video =  $newvideo;
            }

            $result = $home_banner->save();

            if ($result) {
                return redirect('admin/home_banner')->with('success', 'Home banner detail added successfully!');
            } else {
                return redirect('admin/home_banner/create')->with('error', 'Home banner detail not added successfully!');
            }
        } else {
            return redirect()->route('home_banner.create')->withInput()->withErrors($validator);
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
        $title = "Edit Home Banner";
        $home_banner = HomeBanner::find($id);
        return view('admin.home_banner.edit', ['home_banners' => $home_banner], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'video' => 'nullable|file|mimes:mp4|max:32768',
       ]);

        if ($validator->passes()) {

            $home_banner = HomeBanner::find($id);
            if (!$home_banner) {
                return redirect('admin/home_banner')->withError('Home banner detail not found.');
            }

            if (isset($request->video)) {
                $newvideo = time() . '.' . $request->video->extension();
                $request->video->move(public_path('/admin/upload/HomeBanner/'), $newvideo);
                $videodestination = public_path('/admin/upload/HomeBanner/') . $home_banner->video;
                if (file_exists($videodestination) && is_file($videodestination)) {
                    unlink($videodestination);
                }
                $home_banner->video =  $newvideo;
            }

            $result = $home_banner->save();

            if ($result) {
                return redirect('admin/home_banner')->with('success', 'Home banner detail updated successfully!');
            } else {
                return redirect('admin/home_banner/edit')->with('error', 'Home banner detail not updated successfully!');
            }
      
        } else {
            return redirect()->route('home_banner.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $home_banner = HomeBanner::find($id);

        // dd($notification);
        if (!$home_banner) {
            return redirect('admin/home_banner')->withError('Home banner detail not found.');
        }

        $oldVideoPath = public_path('/admin/upload/HomeBanner/') . $home_banner->video;
        if (file_exists($oldVideoPath) && is_file($oldVideoPath)) {
            unlink($oldVideoPath);
        }

        $result = $home_banner->delete();

        if ($result) {
            return redirect('admin/home_banner')->with('success', 'Home banner detail deleted successfully!');
        } else {
            return redirect('admin/home_banner')->with('error', 'Home banner detail not deleted successfully!');
        }
    }
}
