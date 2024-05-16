<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Slider List';
        $data=Slider::orderBy('id','desc')->get();
        return view('admin.slider.list',compact('data','title'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Slider';
        return view('admin.slider.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator= $request->validate([
        'title'=>'required',
        'description'=>'required',
        'status'=>'required',
        'logo'=>'required|image|mimes:jpg,png,jpeg,webp|max:2048'
       ]);
       $slider=new Slider;
       $slider->title=$request->title;
       $slider->description=$request->description;
       $slider->status=$request->status;
       if(isset($request->logo)){
        $file=$request->file('logo');
        $image=time().'.'.$file->extension();
        $request->logo->move(public_path('/admin/uploads/slider_logo'),$image);
        $slider->logo=$image;
       }
       $result=$slider->save();
       if($result){
           return redirect('/admin/slider')->withSuccess('Slider Details Added Successfully');
       }else{
         return redirect('/admin/slider')->withEroor('Unable to Add Slider');
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
        $id=clean_single_input($id);
        $title='Edit Slider';
        $data=Slider::find($id);
        return view('admin.slider.edit',compact('title','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator= $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'logo'=>'image|mimes:jpg,png,jpeg,webp|max:2048'
           ]);
           $slider=Slider::find($id);
           $slider->title=$request->title;
           $slider->description=$request->description;
           $slider->status=$request->status;
           if(isset($request->logo)){
            $file=$request->file('logo');
            $image=time().'.'.$file->extension();
            $request->logo->move(public_path('/admin/uploads/slider_logo'),$image);
            $slider->logo=$image;
           }
           $result=$slider->save();
           if($result){
               return redirect('/admin/slider')->withSuccess('Slider Details Updated Successfully');
           }else{
             return redirect('/admin/slider')->withEroor('Unable to Update Slider');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $result=$slider->delete();
        if($result){
          return redirect('/admin/slider')->withSuccess('Slider Deleted Successfully');
        }else{
           return redirect('/admin/slider')->withErrors('Unable to Delete Slider');
        } 
    }
}
