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
        return view('dashboard.user.userPrint',['users'=>$users]);
    }

    function print()
    {
        $users = User::all();
        return view('dashboard.user.user',['users'=>$users]);
    }
}

