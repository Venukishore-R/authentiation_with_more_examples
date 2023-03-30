<?php

namespace App\Http\Controllers\Print;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PrintController extends Controller
{
    function index()
    {
        $users = User::all();
        return view('dashboard.admin.pages.print.userPrint',['users'=>$users]);
    }

    function print()
    {
        $users = User::all();
        return view('dashboard.admin.pages.print.user',['users'=>$users]);
    }
}

