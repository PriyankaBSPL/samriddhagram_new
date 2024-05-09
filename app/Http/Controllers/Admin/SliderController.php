<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller{
    
   public function add(){
      return view('admin.slider.add');
   }
   public function list(){
      return view('admin.slider.list');
   }

}

?>