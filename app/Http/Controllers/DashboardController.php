<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        $data['activeUsers'] = User::getTotalUsers('active');
        $data['deletedUsers'] = User::getTotalUsers('deleted');
        if(Auth::user()) {
            return view('users.dashboard', $data);
        } else {
            return redirect()->route('login');
        }
    }
}
