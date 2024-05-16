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
        $title='Menu List';
        $data=Menu::where('parent_id',0)->orderBy('position','ASC')->get();
        return view('admin.menu.list',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $title='Add Menu';
        return view('admin.menu.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;
    $validator= $request->validate([
      'title'=>'required',
      'parent_id'=>'required',
      'menu_position'=>'required',
      'type'=>'required'
    ]);

    $menu=new Menu;
    $menu->title=$request->title;
    $menu->slug=Str::slug((clean_single_input($request->title)));
    $menu->parent_id=$request->parent_id;
    $menu->status=$request->status;
    $menu->menu_position=$request->menu_position;
    $menu->type=$request->type;
    if (isset($request->banner_image)) {
        $file = $request->file('banner_image');
        $image = time() . '.' . $file->extension();
        $request->banner_image->move(public_path('/admin/uploads/banner_image'), $image);
        $menu->banner_image = $image; 
    }
    $result = $menu->save();
    if ($result) {
        return redirect('/admin/menu')->withSuccess('Menu detail added Successfully!');
    } else {
        return redirect('/admin/menu')->withError('Unable to added menu details!');
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Menu::where('parent_id',$id)->orderBy('position', 'ASC')->get();
        $title="Menu List";
        return view('admin.menu.list',compact('title','data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id=clean_single_input($id);
        $title="Edit Menu";
        $data = Menu::find($id);
        return view('admin.menu.edit',compact('data','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator= $request->validate([
            'title'=>'required',
            'parent_id'=>'required'
          ]);
      
          $menu=Menu::find($id);
          $menu->title=$request->title;
          $menu->slug=Str::slug((clean_single_input($request->title)));
          $menu->parent_id=$request->parent_id;
          $menu->status=$request->status;
          $menu->menu_position=$request->menu_position;
          $menu->type=$request->type;
          if (isset($request->banner_image)) {
            $newimage = time() . '.' . $request->banner_image->extension();
            $request->banner_image->move(public_path('admin/uploads/banner_image'), $newimage);
            $imagedestination = public_path('admin/uploads/banner_image/') . $menu->image;
            if (file_exists($imagedestination) && is_file($imagedestination)) {
                unlink($imagedestination);
            }
            $menu->banner_image =  $newimage;
            //dd($notification->image);
        }
        //   if (isset($request->banner_image)) {
        //       $file = $request->file('banner_image');
        //       $image = time() . '.' . $file->extension();
        //       $request->banner_image->move(public_path('/admin/uploads/banner_image'), $image);
        //       $menu->banner_image = $image; 
        //   }
          $result = $menu->save();
          if ($result) {
              return redirect('/admin/menu')->withSuccess('Menu detail updated Successfully!');
          } else {
              return redirect('/admin/menu')->withError('Unable to added menu details!');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $delete= $menu->delete();
       return redirect('admin/menu')->with('success','Menu deleted successfully');
    }
}
