<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Gallery List';
        $data = DB::table('galleries')
        ->join('categories as cat1', 'galleries.cat_id', '=', 'cat1.id')
        ->join('menus', 'menus.id', '=', 'cat1.type')
        ->select(
            'galleries.id',
            'galleries.title as gallery_name',
            'cat1.title as category_name',
            'cat1.id as cat_id',
            'menus.title as menu_name'
        )
        ->orderBy('id','DESC')->paginate('20');
       
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
        $validator = Validator::make($request->all(), [
        'title' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect('admin/gallery')->withErrors($validator)->withInput();
    }
    $gallery = new Gallery;
    $gallery->title = $request->title;
    $gallery->cat_id = $request->cat_id; // Assuming 'cat_id' is provided in the form data
    $gallery_result = $gallery->save();
    $last_id = $gallery->id;

    if (!empty($request->file('gallery_image'))) {
        foreach ($request->file('gallery_image') as $row) {
            $gallery_image = new GalleryImage;
            $image = time() . '_' . $row->getClientOriginalName(); 
            if ($row->move(public_path('/admin/uploads/gallery_image'), $image)) {
                $gallery_image->image = $image;
                $gallery_image->gallery_id = $last_id;
                $res = $gallery_image->save();
                if (!$res) {
                    return redirect('admin/gallery')->withError('Unable to save gallery image.');
                }
            } else {
                return redirect('admin/gallery')->withError('Failed to upload gallery image.');
            }
        }
    }

    // Check if gallery data was saved successfully
    if ($gallery_result) {
        return redirect('admin/gallery')->withSuccess('Gallery Data Added Successfully');
    } else {
        return redirect('admin/gallery')->withError('Unable to Add Gallery Data');
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
        $gimg =  GalleryImage::where('gallery_id',$id)->paginate(20);
        return view('admin.category.edit_gallery',compact('data','title','gimg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin/gallery')->withErrors($validator)->withInput();
        }
        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
       // Assuming 'cat_id' is provided in the form data
        $gallery_result = $gallery->save();
        $last_id = $gallery->id;
    
        if (!empty($request->file('image'))) {
            foreach ($request->file('image') as $row) {
                $gallery_image = new GalleryImage;
                $image = time() . '_' . $row->getClientOriginalName(); 
                if ($row->move(public_path('/admin/uploads/gallery_image'), $image)) {
                    $gallery_image->image = $image;
                    $gallery_image->gallery_id = $last_id;
                    $res = $gallery_image->save();
                    if (!$res) {
                        return redirect()->back()->withError('Unable to save gallery image.');
                    }
                } else {
                    return redirect()->back()->withError('Failed to upload gallery image.');
                }
            }
           
           
        }
        return redirect()->back();
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
