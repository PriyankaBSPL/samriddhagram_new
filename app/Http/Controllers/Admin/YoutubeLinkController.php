<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\YoutubeLink;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class YoutubeLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Youtube Link";
        $youtube = YoutubeLink::orderBy('created_at', 'desc')->get();
        return view('admin.youtube.youtube', ['youtubes' => $youtube], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Youtube Link";
        return view('admin.youtube.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'youtube_link' => 'required|url',
        ]);

        if ($validator->passes()) {

            $youtube = new YoutubeLink();

            $youtube->title = $request->title;
            $youtube->youtube_link = $request->youtube_link;

            $result = $youtube->save();

            if ($result) {
                return redirect('admin/youtube')->with('success','Youtube link detail added successfully!');
            } else {
                return redirect('admin/youtube/create')->with('error','Youtube link detail not added successfully!');
            }
        } else {
            return redirect()->route('youtube.create')->withInput()->withErrors($validator);
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
        $title = "Edit Youtube Link";
        $youtube = YoutubeLink::find($id);
        return view('admin.youtube.edit', ['youtubes' => $youtube], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'youtube_link' => 'required|url',
        ]);

        if ($validator->passes()) {

            $youtube = YoutubeLink::find($id);
            if (!$youtube) {
                return redirect('admin/youtube')->withError('Youtube Link calender detail not found.');
            }
            $youtube->title = $request->title;
            $youtube->youtube_link = $request->youtube_link;

            $result = $youtube->save();

            if ($result) {
                return redirect('admin/youtube')->with('success','Youtube Link detail updated successfully!');
            } else {
                return redirect('admin/youtube/edit')->with('error','Youtube Link detail not updated successfully!');
            }
        } else {
            return redirect()->route('youtube.edit')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $youtube = YoutubeLink::find($id);

        // dd($notification);
        if (!$youtube) {
            return redirect('admin/youtube')->withError('Youtube link detail not found.');
        }

        $result = $youtube->delete();

        if ($result) {
            return redirect('admin/youtube')->with('success','Youtube link detail deleted successfully!');
        } else {
            return redirect('admin/youtube')->with('error','Youtube link detail not deleted successfully!');
        }
    }
}
