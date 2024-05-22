<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Models\Admin\Program;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Program List";
        $page = Program::orderBy('created_at', 'desc')->get();
        $SelectPage = Menu::where('type', 'Program')->where('status', 3)->where('parent_id', '>', 1)->pluck('title', 'id');
        return view('admin.program.program', ['programs' => $page, 'SelectPage' => $SelectPage], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Program";
        $SelectPage = Menu::where('type', 'Program')->where('status', 3)->where('parent_id', '>', 1)->pluck('title', 'id');
        return view('admin.program.create', ['SelectPages'=> $SelectPage], compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $Validation = [
            'sector_type' => 'required',
            'page_title' => 'required',
            'design_type' => 'required',
        ];

        if ($request->has('design_type')) {
            if ($request->design_type == '1') {
                $Validation['full_description'] = 'required';
            } elseif ($request->design_type == '2') {
                $Validation['top_description'] = 'required';
                $Validation['image'] = 'image|mimes:jpeg,jpg,png,webp|max:2048';
            }
        }

        $validator = Validator::make($request->all(), $Validation);

        if ($validator->passes()) {

            $program = new Program();

            if (!is_dir('admin/upload/Program')) {
                mkdir('admin/upload/Program', 0777, TRUE);
            }

            $program->sector_type = $request->sector_type;
            $program->page_title = $request->page_title;
            $program->design_type = $request->design_type;
            $program->full_description = $request->full_description;
            $program->top_description = $request->top_description;
            $program->side_description = $request->side_description;

            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/admin/upload/Program'), $image);
                $program->image =  $image;
            }

            $result = $program->save();

            if ($result) {
                return redirect('admin/program')->with('success', 'Program detail added successfully!');
            } else {
                return redirect('admin/program/create')->with('error', 'Program detail not added successfully!');
            }
        } else {
            return redirect()->route('program.create')->withInput()->withErrors($validator);
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
        $title = "Edit Program";
        $program = Program::find($id);
        $SelectPage = Menu::where('type', 'Program')->where('status', 3)->where('parent_id', '>', 1)->pluck('title', 'id');
        return view('admin.program.edit', ['programs' => $program, 'SelectPages'=> $SelectPage], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Validation = [
            'sector_type' => 'required',
            'page_title' => 'required',
            'design_type' => 'required',
        ];

        if ($request->has('design_type')) {
            if ($request->design_type == '1') {
                $Validation['full_description'] = 'required';
            } elseif ($request->design_type == '2') {
                $Validation['top_description'] = 'required';
                $Validation['image'] = 'image|mimes:jpeg,jpg,png,webp|max:2048';
            }
        }

        $validator = Validator::make($request->all(), $Validation);

        if ($validator->passes()) {

            $program = Program::find($id);
            if (!$program) {
                return redirect('admin/program')->withError('Program detail not found.');
            }

            $program->sector_type = $request->sector_type;
            $program->page_title = $request->page_title;
            // $program->design_type = $request->design_type;

            if ($request->design_type == $program->design_type) {
                $program->full_description = $request->full_description;
                $program->top_description = $request->top_description;
                $program->side_description = $request->side_description;

                if (isset($request->image)) {
                    $newimage = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('/admin/upload/Program/'), $newimage);
                    $imagedestination = public_path('/admin/upload/Program/') . $program->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }
                    $program->image =  $newimage;
                }
            } else if ($request->design_type != $program->design_type) {
                if ($request->design_type == '1') {

                    $imagedestination = public_path('/admin/upload/Program/') . $program->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }

                    $program->top_description = null;
                    $program->side_description = null;
                    $program->image = null;
                    $program->full_description = $request->full_description;
                    $program->design_type =  $request->design_type;
                } else if ($request->design_type == '2') {

                    $program->full_description = null;
                    $program->top_description = $request->top_description;
                    $program->side_description = $request->side_description;

                    if (isset($request->image)) {
                        $newimage = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('/admin/upload/Program/'), $newimage);
                        $imagedestination = public_path('/admin/upload/Program/') . $program->image;
                        if (file_exists($imagedestination) && is_file($imagedestination)) {
                            unlink($imagedestination);
                        }
                        $program->image =  $newimage;
                    }
                    $program->design_type =  $request->design_type;
                }
            }

            $result = $program->save();

            if ($result) {
                return redirect('admin/program')->with('success', 'Program detail updated successfully!');
            } else {
                return redirect('admin/program/edit')->with('error', 'Program detail not updated successfully!');
            }
        } else {
            return redirect()->route('program.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $program = program::find($id);

        // dd($notification);
        if (!$program) {
            return redirect('admin/program')->withError('Program detail not found.');
        }

        $oldImagePath = public_path('/admin/upload/Program/') . $program->image;
        if (file_exists($oldImagePath) && is_file($oldImagePath)) {
            unlink($oldImagePath);
        }

        $result = $program->delete();

        if ($result) {
            return redirect('admin/program')->with('success', 'Program detail deleted successfully!');
        } else {
            return redirect('admin/program')->with('error', 'Program detail not deleted successfully!');
        }
    }
}
