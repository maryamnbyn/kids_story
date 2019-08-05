<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Requests\Admin\adminUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('panel.admin.index');
    }

    public function profile()
    {
        $admins = Admin::all();

        return view('panel.admin.profile', compact('admins'));
    }

    public function update(adminUpdateRequest $request , $id)
    {
        $admin = Admin::where('id', $id)->first();

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back();
    }
}
