<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\StatePage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StatePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "State Page";
        $state_page = StatePage::orderBy('created_at', 'desc')->get();
        return view('admin.state_page.state_page', ['state_pages' => $state_page], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add State Page";
        return view('admin.state_page.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'state_name' => 'required',
            'number_of_training' => 'nullable|numeric',
            'number_of_trainee' => 'nullable|numeric',
            'url' => 'nullable|url',
        ]);

        if ($validator->passes()) {

            $state_page = new StatePage();

            $state_page->state_name = $request->state_name;
            $state_page->number_of_training = $request->number_of_training;
            $state_page->number_of_trainee = $request->number_of_trainee;
            $state_page->url = $request->url;

            $result = $state_page->save();

            if ($result) {
                return redirect('admin/state_page')->with('success', 'State page detail added successfully!');
            } else {
                return redirect('admin/state_page/create')->with('error', 'State page detail not added successfully!');
            }
        } else {
            return redirect()->route('state_page.create')->withInput()->withErrors($validator);
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
        $title = "Edit State Page";
        $state_page = StatePage::find($id);
        return view('admin.state_page.edit', ['state_pages' => $state_page], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'state_name' => 'required',
            'number_of_training' => 'nullable|numeric',
            'number_of_trainee' => 'nullable|numeric',
            'url' => 'nullable|url',
        ]);

         if ($validator->passes()) {

            $state_page = StatePage::find($id);
            if (!$state_page) {
                return redirect('admin/state_page')->withError('State Page detail not found.');
            }

            $state_page->state_name = $request->state_name;
            $state_page->number_of_training = $request->number_of_training;
            $state_page->number_of_trainee = $request->number_of_trainee;
            $state_page->url = $request->url;

            $result = $state_page->save();

            if ($result) {
                return redirect('admin/state_page')->with('success', 'State Page detail updated successfully!');
            } else {
                return redirect('admin/state_page/edit')->with('error', 'State Page detail not updated successfully!');
            }
        } else {
            return redirect()->route('state_page.edit', $id)->withInput()->withErrors($validator);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $state_page = StatePage::find($id);

        // dd($notification);
        if (!$state_page) {
            return redirect('admin/state_page')->withError('State Page detail not found.');
        }

        $result = $state_page->delete();

        if ($result) {
            return redirect('admin/state_page')->with('success', 'State Page detail deleted successfully!');
        } else {
            return redirect('admin/state_page')->with('error', 'State Page detail not deleted successfully!');
        }
    }
}
