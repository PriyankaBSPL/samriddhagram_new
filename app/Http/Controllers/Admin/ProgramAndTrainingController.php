<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProgramAndTraining;
use Illuminate\Support\Facades\Validator;

class ProgramAndTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Program And Training List";
        $program_and_training = ProgramAndTraining::orderBy('created_at', 'desc')->get();
        return view('admin.program_and_training.program_and_training', ['program_and_trainings' => $program_and_training], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Program And Training";
        return view('admin.program_and_training.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($validator->passes()) {

            $program_and_training = new ProgramAndTraining();

            if (!is_dir('admin/upload/ProgramAndTraining')) {
                mkdir('admin/upload/ProgramAndTraining', 0777, TRUE);
            }

            $program_and_training->title = $request->title;

            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/admin/upload/ProgramAndTraining'), $image);
                $program_and_training->image =  $image;
            }

            $result = $program_and_training->save();

            if ($result) {
                return redirect('admin/program_and_training')->with('success', 'Program and training detail added successfully!');
            } else {
                return redirect('admin/program_and_training/create')->with('error', 'Program and training detail not added successfully!');
            }
        } else {
            return redirect()->route('program_and_training.create')->withInput()->withErrors($validator);
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
        $program_and_training = ProgramAndTraining::find($id);
        return view('admin.program_and_training.edit', ['program_and_trainings' => $program_and_training], compact('title'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($validator->passes()) {

            $program_and_training = ProgramAndTraining::find($id);
            if (!$program_and_training) {
                return redirect('admin/program_and_training')->withError('Program and training detail not found.');
            }

            $program_and_training->title = $request->title;

            if (isset($request->image)) {
                $newimage = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/admin/upload/ProgramAndTraining/'), $newimage);
                $imagedestination = public_path('/admin/upload/ProgramAndTraining/') . $program_and_training->image;
                if (file_exists($imagedestination) && is_file($imagedestination)) {
                    unlink($imagedestination);
                }
                $program_and_training->image =  $newimage;
            }

            $result = $program_and_training->save();

            if ($result) {
                return redirect('admin/program_and_training')->with('success', 'Program and training detail updated successfully!');
            } else {
                return redirect('admin/program_and_training/edit')->with('error', 'Program and training detail not updated successfully!');
            }
        } else {
            return redirect()->route('program_and_training.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $program_and_training = ProgramAndTraining::find($id);

        // dd($notification);
        if (!$program_and_training) {
            return redirect('admin/program_and_training')->withError('Program and training detail not found.');
        }

        $oldImagePath = public_path('/admin/upload/ProgramAndTraining/') . $program_and_training->image;
        if (file_exists($oldImagePath) && is_file($oldImagePath)) {
            unlink($oldImagePath);
        }

        $result = $program_and_training->delete();

        if ($result) {
            return redirect('admin/program_and_training')->with('success', 'Program and training detail deleted successfully!');
        } else {
            return redirect('admin/program_and_training')->with('error', 'Program and training detail not deleted successfully!');
        }
    }
}
