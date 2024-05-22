<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\LatestTraining;
use Illuminate\Support\Facades\Validator;

class LatestTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Latest Training";
        $latest_training = LatestTraining::orderBy('created_at', 'desc')->get();
        return view('admin.latest_training.latest_training', ['latest_trainings' => $latest_training], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Latest Training";
        return view('admin.latest_training.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $latest_training = new LatestTraining();

            $latest_training->description = $request->description;

            $result = $latest_training->save();

            if ($result) {
                return redirect('admin/latest_training')->with('success', 'Latest training detail added successfully!');
            } else {
                return redirect('admin/latest_training/create')->with('error', 'Latest training detail not added successfully!');
            }
        } else {
            return redirect()->route('latest_training.create')->withInput()->withErrors($validator);
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
        $title = "Edit Latest Training";
        $latest_training = LatestTraining::find($id);
        return view('admin.latest_training.edit', ['latest_trainings' => $latest_training], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

         if ($validator->passes()) {

            $latest_training = LatestTraining::find($id);
            if (!$latest_training) {
                return redirect('admin/latest_training')->withError('Latest training detail not found.');
            }

            $latest_training->description = $request->description;

            $result = $latest_training->save();

            if ($result) {
                return redirect('admin/latest_training')->with('success', 'Latest training detail updated successfully!');
            } else {
                return redirect('admin/latest_training/edit')->with('error', 'Latest training detail not updated successfully!');
            }
        } else {
            return redirect()->route('latest_training.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $latest_training = LatestTraining::find($id);

        // dd($notification);
        if (!$latest_training) {
            return redirect('admin/latest_training')->withError('Latest training detail not found.');
        }

        $result = $latest_training->delete();

        if ($result) {
            return redirect('admin/latest_training')->with('success', 'Latest training detail deleted successfully!');
        } else {
            return redirect('admin/latest_training')->with('error', 'Latest training detail not deleted successfully!');
        }
    }
}
