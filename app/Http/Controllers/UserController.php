<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('user.create_user', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'max:12'],
            'location' => 'required',
            'vat_no' => 'required',
        ]);

        $input = $request->all();

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile_no' => $input['mobile_no'],
            'password' => $input['password'],
            'location' => $input['location'],
            'vat_no' => $input['vat_no']
        ]);
        return redirect('users');
    }

    public function show(){
        $data = array();
        $user = User::all();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('user.users', compact('data'), ['userdata' => $user]);
    }

    public function edit($id){
        $data = array();
        $user = User::where('id', '=', $id)->first();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('user.update_user',compact('data'), ['user' => $user]);
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile_no = $request->input('mobile_no');
        $user->password = $request->input('password');
        $user->location = $request->input('location');
        $user->vat_no = $request->input('vat_no');
        $user->update();
        return redirect('users')->with('success','User Updated Successfully');
    }
}
