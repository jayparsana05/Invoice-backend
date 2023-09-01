<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientCntroller extends Controller
{
    public function create()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('client.create_client', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'email' => ['required', 'email'],
            'mobile_no' => 'required',
            'password' => ['required', 'min:3', 'max:12'],
            'address' => 'required',
        ]);

        $input = $request->all();

        Client::create([
            'name' => $input['name'],
            'company_name' => $input['company_name'],
            'email' => $input['email'],
            'mobile_no' => $input['mobile_no'],
            'password' => $input['password'],
            'address' => $input['address'],
        ]);
        return redirect('clients');
    }

    public function show(){
        $data = array();
        $client = Client::all();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('client.clients', compact('data'), ['clientdata' => $client]);
    }

    public function edit($id){
        $data = array();
        $client = Client::where('id', '=', $id)->first();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('client.update_client',compact('data'), ['client' => $client]);
    }

    public function update(Request $request,$id){
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->company_name = $request->input('company_name');
        $client->email = $request->input('email');
        $client->mobile_no = $request->input('mobile_no');
        $client->password = $request->input('password');
        $client->address = $request->input('address');
        $client->update();
        return redirect('clients')->with('success','User Updated Successfully');
    }
}
