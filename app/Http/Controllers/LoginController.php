<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function check(Request $request)
    {
     $request->validate([
     'email' => ['required', 'email'],
     'password' => ['required','min:3','max:12'],
        ]);

        $admin = Admin::where('email', '=', $request->email)->first();
        if($admin){
            if($request->password == $admin->password){
                $request->Session()->put('loginId',$admin->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matches.');
            }
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }

    public function logout() 
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
