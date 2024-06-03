<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Pop Up List";
        $popup = PopUp::orderBy('created_at', 'desc')->get();
        return view('admin.popup.popup', ['popups' => $popup], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Pop Up";
        return view('admin.popup.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $Validation = [
            'title' => 'required',
            'design_type' => 'required',
        ];

        if ($request->has('design_type')) {
            if ($request->design_type == '1') {
                $Validation['description'] = 'required';
            } elseif ($request->design_type == '2') {
                $Validation['image'] = 'image|mimes:jpeg,jpg,png,webp|max:2048';
            }
        }

        $validator = Validator::make($request->all(), $Validation);

        if ($validator->passes()) {

            $popup = new PopUp();

            if (!is_dir('admin/upload/PopUp')) {
                mkdir('admin/upload/PopUp', 0777, TRUE);
            }

            $popup->title = $request->title;
            $popup->design_type = $request->design_type;
            $popup->description = $request->description;

            if (isset($request->image)) {
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/admin/upload/PopUp'), $image);
                $popup->image =  $image;
            }

            $result = $popup->save();

            if ($result) {
                return redirect('admin/popup')->with('success', 'Pop up detail added successfully!');
            } else {
                return redirect('admin/popup/create')->with('error', 'Pop up detail not added successfully!');
            }
        } else {
            return redirect()->route('popup.create')->withInput()->withErrors($validator);
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
        $title = "Edit Pop Up";
        $popup = PopUp::find($id);
        return view('admin.popup.edit', ['popups' => $popup], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Validation = [
            'title' => 'required',
            'design_type' => 'required',

        ];

        if ($request->has('design_type')) {
            if ($request->design_type == '1') {
                $Validation['description'] = 'required';
            } elseif ($request->design_type == '2') {
                $Validation['image'] = 'image|mimes:jpeg,jpg,png,webp|max:2048';
            }
        }

        $validator = Validator::make($request->all(), $Validation);

        if ($validator->passes()) {

            $popup = PopUp::find($id);
            if (!$popup) {
                return redirect('admin/popup')->withError('Pop Up detail not found.');
            }

            if ($request->design_type == $popup->design_type) {
                $popup->title = $request->title;
                $popup->description = $request->description;

                if (isset($request->image)) {
                    $newimage = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('/admin/upload/PopUp/'), $newimage);
                    $imagedestination = public_path('/admin/upload/PopUp/') . $popup->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }
                    $popup->image =  $newimage;
                }

            } else if ($request->design_type != $popup->design_type) {
                if ($request->design_type == '1') {

                    $imagedestination = public_path('/admin/upload/PopUp/') . $popup->image;
                    if (file_exists($imagedestination) && is_file($imagedestination)) {
                        unlink($imagedestination);
                    }

                    $popup->title = $request->title;
                    $popup->description = $request->description;;
                    $popup->image = null;

                    $popup->design_type =  $request->design_type;
                } else if ($request->design_type == '2') {

                    $popup->title = $request->title;
                    $popup->description = null;

                    if (isset($request->image)) {
                        $newimage = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('/admin/upload/PopUp/'), $newimage);
                        $imagedestination = public_path('/admin/upload/PopUp/') . $popup->image;
                        if (file_exists($imagedestination) && is_file($imagedestination)) {
                            unlink($imagedestination);
                        }
                        $popup->image =  $newimage;
                    }
                    $popup->design_type =  $request->design_type;
                }
            }

            $result = $popup->save();

            if ($result) {
                return redirect('admin/popup')->with('success', 'Pop Up detail updated successfully!');
            } else {
                return redirect('admin/popup/edit')->with('error', 'Pop Up detail not updated successfully!');
            }
        } else {
            return redirect()->route('popup.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $popup = PopUp::find($id);

        // dd($notification);
        if (!$popup) {
            return redirect('admin/popup')->withError('Pop Up detail not found.');
        }

        $oldImagePath = public_path('/admin/upload/PopUp/') . $popup->image;
        if (file_exists($oldImagePath) && is_file($oldImagePath)) {
            unlink($oldImagePath);
        }

        $result = $popup->delete();

        if ($result) {
            return redirect('admin/popup')->with('success', 'popup detail deleted successfully!');
        } else {
            return redirect('admin/popup')->with('error', 'popup detail not deleted successfully!');
        }
    }
}
