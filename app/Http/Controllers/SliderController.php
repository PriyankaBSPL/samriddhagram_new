<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Menu;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('admin.sliders.add');  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Slider';
        return view('admin.sliders.add',compact('title'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
