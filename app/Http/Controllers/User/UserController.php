<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Mail;

use Kreait\Firebase\Database;
use App\Http\Controllers\FirebaseController;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;

class UserController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'users';
    }

    function create(Request $request){
        //Validate Inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        // if( $save ){
        //     return redirect()->back()->with('success','You are now registered successful');
        // }else{
        //     return redirect()->back()->with('fail','Something went wrong, failed to register');
        // }

        return app('App\Http\Controllers\Firebase\FirebaseController')->createFirebase($request);
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    function mail()
    {
        $data = ['name'=>'venu','sub'=>'sub'];
        Mail::send('mail',$data,function($messages){
            $messages->to(Auth::guard('web')->user()->email);
            $messages->subject('Hello World');
            $messages->attach(Auth::guard('web')->user()->name.'.png');
        }); 
    }

    // function print2()
    // {
    //     return app('App\Http\Controllers\Firebase\FirebaseController')->print();
    // }

    public function importView(Request $request)
    {
        return view('Excel.importFile');
    }
 
    public function import(Request $request)
    {
        Excel::import(new ImportUser,$request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
