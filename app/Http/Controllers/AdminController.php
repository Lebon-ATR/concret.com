<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function list()
    {
        $data['header_title'] = ' Liste des Admins';
        return view('admin.admin.list');
    }
    public function add()
    {
        $data['header_title'] = 'Ajouter un Admin';
        return view('admin.admin.add');
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin ajouté avec succes');

    }

}
