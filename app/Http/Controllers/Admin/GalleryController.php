<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryImage;
use Illuminate\Support\Facades\DB;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Gallery List';
        $data=Gallery::orderBy('id','DESC')->get();
        return view('admin.category.gallery',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validator=$request->validate([
                'title'=>'required',
            ]);
            $gallery=new Gallery;
            $gallery->title=$request->title;
            $gallery->cat_id=$request->cat_id;
            $gallery_result=$gallery->save();
            $last_id=$gallery->id;
            if(!empty($request->file('gallery_image'))){
                foreach($request->file('gallery_image') as $row){
                    $gallery_image=  new GalleryImage;
                    $image = time() . '.' . $row->getClientOriginalName();
                    $row->move(public_path('/admin/uploads/category_image'), $image);
                    $gallery_image->image = $image; 
                    $gallery_image->gallery_id = $last_id;
                    $res= $gallery_image->save();
                }
            }
            if($gallery_result){
                return redirect('admin/gallery')->withSuccess('Gallery Data Added Successfully');
             }else{
               return redirect('admin/gallery')->withEroor('Unable to Add Gallery Data');
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
        $title='Edit Gallery';
        $data=Gallery::find($id);
        return view('admin.category.edit_gallery',compact('data','title'));
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
    public function destroy(Gallery $gallery)
    {
       

    DB::table('gallery_images')->where('gallery_id', $gallery->id)->delete();
    $result = $gallery->delete();
        if($result){
           return redirect('/admin/gallery')->withSuccess('Category Deleted Successfully');
        }else{
          return redirect('/admin/gallery')->withEroor('Unable to Delete Category');
        }
    }
}
