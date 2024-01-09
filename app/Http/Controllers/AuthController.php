<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
         // dd(Hash::make(123456));

        if (Auth::check()) {
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('enseignant/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                return redirect('etudiant/dashboard');
            }
            else if(Auth::user()->user_type == 4){
                return redirect('parent/dashboard');
            }
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request)
    {
        // dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('enseignant/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                return redirect('etudiant/dashboard');
            }
            else if(Auth::user()->user_type == 4){
                return redirect('parent/dashboard');
            }
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back()->with('error', 'Veuillez entrer correctement l\'adresse e-mail ou le mot de passe.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(' '));
    }
}
