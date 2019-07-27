<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('panel.dashboard');
    }
    public function profile()
    {
        return view('panel.admin.profile');
    }
}
