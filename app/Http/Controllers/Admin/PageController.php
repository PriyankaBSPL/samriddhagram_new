<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Page;
use Illuminate\Http\Request;
use App\Models\Admin\PageDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Page List";
        $page = Page::orderBy('created_at', 'desc')->get();
        return view('admin.page.page', ['pages' => $page], compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Add Page";
        return view('admin.page.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store1(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'page_title' => 'required',
        ]);

        if ($validator->passes()) {

            $page_deatil = new PageDetail();

            $page_deatil->page_title = $request->page_title;

            $result = $page_deatil->save();
        } else {
            return redirect()->route('home_gallery.create')->withInput()->withErrors($validator);
        }

        $request->validate([
            'descriptions.*' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);


        // Iterate through each description and image
        foreach ($request->descriptions as $index => $description) {
            // Create a new Page instance
            $page = new Page();

            // Assign the description
            $page->description = $description;

            if ($request->hasFile('images.' . $index)) {
                $image = $request->file('images.' . $index);
                $newImageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/admin/upload/Page/'), $newImageName);
                $page->image = $newImageName;
            }

            // Save the page
            $result = $page->save();
        }

        // Redirect with success message
        if ($result) {
            return redirect('admin/page')->with('success', 'Home intro detail added successfully!');
        } else {
            return redirect('admin/page/create')->with('error', 'Home intro detail not added successfully!');
        }
    }


    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'page_title' => 'required',
            'descriptions.*' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('page.create')->withInput()->withErrors($validator);
        }

        // Begin transaction
        DB::beginTransaction();

        try {
            // Save data into PageDetail table
            $page_detail = new PageDetail();
            $page_detail->page_title = $request->page_title;
            $page_detail->save();

            // Save data into Page table
            foreach ($request->descriptions as $index => $description) {
                $page = new Page();
                $page->description = $description;

                if ($request->hasFile('images.' . $index)) {
                    $image = $request->file('images.' . $index);
                    $newImageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('/admin/upload/Page/'), $newImageName);
                    $page->image = $newImageName;
                }

                $page->save();
            }

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect('admin/page')->with('success', 'Home intro detail added successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();

            // Redirect with error message
            return redirect('admin/page/create')->with('error', 'Home intro detail not added successfully!');
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
        $title = "Edit Page";
        $page = Page::find($id);
        return view('admin.page.edit', ['pages' => $page], compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
