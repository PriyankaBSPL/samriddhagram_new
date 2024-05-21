<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\TrainingProgram;
use Illuminate\Support\Facades\Validator;

class TrainingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Training Program";
        $training = TrainingProgram::orderBy('created_at', 'desc')->get();
        return view('admin.training_program.index', ['trainings' => $training], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Training Program";
        return view('admin.training_program.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'startdate' => 'required',
            'enddate' => 'required|after_or_equal:startdate',
            'title' => 'required',
            'duration' => 'required',
            'beneficiaries' => 'required',
        ]);

        if ($validator->passes()) {

            $training = new TrainingProgram();

            $training->startdate = $request->startdate;
            $training->enddate = $request->enddate;
            $training->title = $request->title;
            $training->duration = $request->duration;
            $training->beneficiaries = $request->beneficiaries;

            $result = $training->save();

            if ($result) {
                return redirect('admin/training')->with('success','Training calender detail added successfully!');
            } else {
                return redirect('admin/training/create')->with('error','Training calender detail not added successfully!');
            }
        } else {
            return redirect()->route('training.create')->withInput()->withErrors($validator);
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
        $title = "Edit Traing Program";
        $training = TrainingProgram::find($id);
        return view('admin.training_program.edit', ['trainings' => $training], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'startdate' => 'required',
            'enddate' => 'required|after_or_equal:startdate',
            'title' => 'required',
            'duration' => 'required',
            'beneficiaries' => 'required',
        ]);

        if ($validator->passes()) {

            $training = TrainingProgram::find($id);
            if (!$training) {
                return redirect('training')->withError('Training calender detail not found.');
            }
            $training->startdate = $request->startdate;
            $training->enddate = $request->enddate;
            $training->title = $request->title;
            $training->duration = $request->duration;
            $training->beneficiaries = $request->beneficiaries;

            $result = $training->save();

            if ($result) {
                return redirect('admin/training')->with('success','Training calender detail updated successfully!');
            } else {
                return redirect('admin/training/edit')->with('error','Training calender detail not updated successfully!');
            }
        } else {
            return redirect()->route('training.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $training = TrainingProgram::find($id);

        // dd($notification);
        if (!$training) {
            return redirect('admin/training')->withError('Training calender detail not found.');
        }

        $result = $training->delete();

        if ($result) {
            return redirect('admin/training')->with('success','Training calender detail deleted successfully!');
        } else {
            return redirect('admin/training')->with('error','Training calender detail not deleted successfully!');
        }
    }
}
