<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function whoami(){
        return view('admin.test');
    }
}
