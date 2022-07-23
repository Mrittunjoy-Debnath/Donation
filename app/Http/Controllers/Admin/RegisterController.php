<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function manageRegister()
    {
        $totalUser = User::latest()->get();

        return view('admin.register.index',[
            'totalUser' => $totalUser,
        ]);
    }
    public function manageAdmin()
    {
        $totalAdmin = User::where('is_admin',1)
                            ->latest()
                            ->get();

        return view('admin.register.admin',[
            'totalAdmin' => $totalAdmin,
        ]);
    }
}
