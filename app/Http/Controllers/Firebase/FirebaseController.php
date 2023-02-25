<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'users';
    }

    function createFirebase(Request $request)
    {
        $Data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $ref = $this->database->getReference($this->tablename)->push($Data);

        if( $ref ){
            return redirect()->back()->with('success','You are now registered successful');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
    }

    function print()
    {
        return "Venu";
    }
}

