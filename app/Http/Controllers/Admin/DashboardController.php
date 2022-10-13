<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
        $adminData = Admin::find(1);
        $orders = Order::all();

        return view('admin.index',compact('adminData','orders'));
    }
    
}
