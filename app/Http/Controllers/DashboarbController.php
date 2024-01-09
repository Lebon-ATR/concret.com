<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {
            return redirect()->route('admin.dashboard')->with($data);
        } else if (Auth::user()->user_type == 2) {
            return redirect()->route('enseignant.dashboard')->with($data);
        } else if (Auth::user()->user_type == 3) {
            return redirect()->route('etudiant.dashboard')->with($data);
        } else if (Auth::user()->user_type == 4) {
            return redirect()->route('parent.dashboard')->with($data);
        }
    }
}
