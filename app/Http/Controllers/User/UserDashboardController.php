<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //

    public function dashboard()
    {
        $title = "User Profile";

        return view('user.index', compact('title'));
    }

}
