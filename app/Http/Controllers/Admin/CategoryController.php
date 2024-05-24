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
        $title='Category List';
        $data=Category::orderBy('id','DESC')->get();
        return view('admin.category.list',compact('title','data'));
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
                $image = time() . '.' . $row->getClientOriginalName();
                $row->move(public_path('/admin/uploads/category_image'), $image);
                $cat_image->image = $image; 
                $cat_image->cat_id = $last_id;
                $res= $cat_image->save();
            }
        }
        if($category_result){
            return redirect('/admin/category')->withSuccess('Category Added Successfully');
         }else{
           return redirect('/admin/category')->withEroor('Unable to Add Category');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id=clean_single_input($id);
        $title='Catgory Images';
        $data=CategoryImage::where('cat_id',$id)->get();
        return view('admin.category.cat_images',compact('title','data','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id=clean_single_input($id);
        $title='Edit Category';
        $data=Category::find($id);
        return view('admin.category.edit',compact('data','title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type'=>'required',
            'title'=>'required',
            'status'=>'required',
        ]);
        $category=Category::find($id);
        $category->title=$request->title;
        $category->type=$request->type;
        $category->status=$request->status;
        $result=$category->save();
        if($result){
            return redirect('/admin/category')->withSuccess('Category Updated Successfully');
        }else{
            return redirect('/admin/category')->withEroor('Unable to Update Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $result=$category->delete();
        if($result){
           return redirect('/admin/category')->withSuccess('Category Deleted Successfully');
        }else{
          return redirect('/admin/category')->withEroor('Unable to Delete Category');
        }
    }
}
