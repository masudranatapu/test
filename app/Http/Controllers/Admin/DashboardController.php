<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $title = "Admin Dashboard";
        $users = User::where('role_id', 2)->get();
        return view('admin.index', compact('title', 'users'));
    }


    public function userActive($id)
    {
        User::findOrFail($id)->update([
            'status' => 1,
        ]);

            Toastr::success('User successfully active :-)','Success');
        return redirect()->back();
        
    }

    public function userInactive($id)
    {
        User::findOrFail($id)->update([
            'status' => 0,
        ]);

    Toastr::info('User successfully inactive :-)','Success');
        return redirect()->back();
        
    }


    public function userDelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        Toastr::success('User successfully deleted :-)','Success');
        return redirect()->back();

    }

    
}
