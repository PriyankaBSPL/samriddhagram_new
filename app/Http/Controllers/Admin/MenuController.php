<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "test";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Menu';
        return view('admin.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validator= $request->validate([
      'title'=>'required',
      'parent_id'=>'required'
    ]);
    $menu=new Menu;
    $menu->title=$request->title;
    $menu->slug=Str::slug((clean_single_input($request->title)));
    $menu->parent_id=$request->parent_id;
    $menu->status=$request->status;
    if (isset($request->banner_image)) {
        $file = $request->file('banner_image');
        $image = time() . '.' . $file->extension();
        $request->banner_image->move(public_path('/admin/uploads/banner_image'), $image);
        $menu->banner_image = $image; 
    }
    $result = $menu->save();
    if ($result) {
        return redirect('/menu')->withSuccess('Menu detail added Successfully!');
    } else {
        return redirect('/menu')->withError('Unablt to added menu details!');
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
