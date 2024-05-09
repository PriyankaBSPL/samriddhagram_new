<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        //this method is show dashboard page 
        public function dashboard()
        {
            return view('admin.dashboard');
        }
}
