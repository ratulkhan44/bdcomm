<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sms;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function adduser()
    {
        return view('pages.admin.adduser');
    }

    public function adduserStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|min:3',
            'user_id' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'user_type' => 'required',
            'contact' => 'required|integer',
            'password' => 'required|min:6',
        ]);
        $adduser = new User();
        $adduser->name = $request->name;
        $adduser->user_id = $request->user_id;
        $adduser->email = $request->email;
        $adduser->user_type = $request->user_type;
        $adduser->role_id = ($request->user_type == 'Entry') ? 3 : 2;
        $adduser->contact = $request->contact;
        $adduser->password = Hash::make($request->password);
        $adduser->save();
        return redirect()->back();

    }

    public function addForm()
    {
        return view('pages.admin.addformdata');
    }

    public function smsDetails()
    {
        $sms=Sms::select(['id','client_id','user_id'])->get()->first();
        echo $sms;
        die();
        //$user=User::all()->where('id','=',$sms->user_id);
        $client=Client::select(['id','name','email','contact'])->where('id','=', $sms->client_id)->get();
        

        dd($client);
        return view('pages.admin.smsdetails',compact(['sms','client']));
    }
}
