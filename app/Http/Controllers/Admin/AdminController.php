<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryImage;

class AdminController extends Controller
{
    public function delete_image($id){
        $data=CategoryImage::find($id);
        if (!$data) {
            return redirect()->back()->withError('Image not found');
        }
        $image_path = public_path('/admin/uploads/category_image/') . $data->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        $data->delete();
        }
        return redirect()->back()->withSuccess('Image deleted Successfully!!!');
    }
    
public function update_image(Request $request)
{
   
    $request->validate([
        'image_id' => 'required|exists:category_images,id',
        'new_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 
    ]);
    $imageId = $request->input('image_id');
    $newImage = $request->file('new_image');
    // Find the image data by ID
    $image = CategoryImage::findOrFail($imageId);
    // Delete the existing image file, if any
    if (!empty($image->image)) {
        $imagePath = public_path('/admin/uploads/category_image/') . $image->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    // Upload the new image file
    $imageName = time() . '_' . uniqid() . '.' . $newImage->getClientOriginalExtension();
    $newImage->move(public_path('/admin/uploads/category_image/'), $imageName);
    // Update the image data in the database
    $image->image = $imageName;
    $image->save();
    // Return success response
    return redirect()->back()->withSuccess('Image updated Successfully!!!');
}
}
