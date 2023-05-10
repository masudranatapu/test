<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

        return redirect()->back()->with('active', 'User successfully active');
        
    }

    public function userInactive($id)
    {
        User::findOrFail($id)->update([
            'status' => 0,
        ]);

        return redirect()->back()->with('inactive', 'User successfully inactive');
        
    }


    public function userDelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('success', 'User successfully deleted');

    }

    
}
