<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add Gallery Category';
        return view('admin.category.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'title'=>'required',
            'status'=>'required',
            'type'=>'required',
        ]);
        $category=new Category;
        $category->title=$request->title;
        $category->status=$request->status;
        $category->type=$request->type;
        $category_result=$category->save();
        $last_id=$category->id;
        if(!empty($request->file('image'))){
            foreach($request->file('image') as $row){
                $cat_image=  new CategoryImage;
                $image = time() . '.' . $row->extension();
                $row->move(public_path('/admin/uploads/category_image'), $image);
                $cat_image->image = $image; 
                $cat_image->cat_id = $last_id;
              $res= $cat_image->save();
            
            }
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
