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
        // ->join('category_images', 'cat1.id', '=', 'category_images.cat_id')
        ->join('menus', 'menus.id', '=', 'cat1.type')
        ->select(
            'galleries.id',
            'galleries.cat_img_id',
            'galleries.title as gallery_name',
            'cat1.title as category_name',
            'galleries.cat_id',
            'menus.title as menu_name'
          //  'category_images.id as category_img_id'
        )
        ->orderBy('galleries.id','DESC')->get();
    //    echo "<pre>";
    //    print_r($data);
    //    echo "</pre>";
    //    exit;
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
        // echo "<pre>";
        // print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
        'title' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect('admin/gallery')->withErrors($validator)->withInput();
    }
    $cat_img_id = $request->input('row_id');
    $gallery = new Gallery;
    $gallery->title = $request->title;
    $gallery->cat_id = $request->cat_id; // Assuming 'cat_id' is provided in the form data
    $gallery->cat_img_id = $cat_img_id; 
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
        //    return redirect()->back();
        }
    }

    // Check if gallery data was saved successfully
    if ($gallery_result) {
        return redirect()->back()->withSuccess('Gallery Data Added Successfully');
    } else {
        return redirect()->back()->withError('Unable to Add Gallery Data');
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
        $gimg =  GalleryImage::where('gallery_id',$id)->get();
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
