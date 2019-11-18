<?php

namespace App\Http\Controllers\Entry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Citycorp;
use App\Client;
use App\District;
use App\Division;
use App\Pourosava;
use App\Sms;
use App\Smsdetail;
use App\PermanentAddress;
use App\Political;
use App\PresentAddress;
use App\Profession;
use App\Upazilla;
use App\User;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function index()
    {
        //$divisions=Division::all();
        return view('pages.entry.dashboard');
    }

    public function submitForm(Request $request)
    {
        $politicalInfo=new Political();
        $politicalInfo->political=$request->political_view;
        $politicalInfo->wing=$request->wing_name;
        $politicalInfo->unit=$request->unit_name;
        $politicalInfo->post=$request->post_name;
        $politicalInfo->save();
        $politicalID=$politicalInfo->id;

        $professionInfo=new Profession();
        $professionInfo->profession=$request->profession_type;
        $professionInfo->professional=$request->professional;
        $professionInfo->business=$request->business_type;
        $professionInfo->organization=$request->org_name;
        $professionInfo->save();
        $professionID=$professionInfo->id;

        $permanentInfo=new PermanentAddress();
        $permanentInfo->division_id=$request->division;
        $permanentInfo->district_id=$request->district;
        $permanentInfo->upazilla_id=$request->upazila;
        $permanentInfo->union=$request->union;
        $permanentInfo->village=$request->village;
        $permanentInfo->pourosava_id=$request->pourosava;
        $permanentInfo->citycorp_id=$request->city_corporation;
        $permanentInfo->save();
        $PermanentID = $permanentInfo->id;

        $presentInfo=new PresentAddress();
        $presentInfo->division_id=$request->division1;
        $presentInfo->district_id=$request->district1;
        $presentInfo->upazilla_id=$request->upazila1;
        $presentInfo->union=$request->union1;
        $presentInfo->village=$request->village1;
        $presentInfo->pourosava_id=$request->pourosava1;
        $presentInfo->citycorp_id=$request->city_corporation1;
        $presentInfo->save();
        $PresentID = $presentInfo->id;

        if($permanentInfo->save()){
            $client=new Client();
            $client->contact=$request->mobile;
            $client->gender=$request->gender;
            $client->education=$request->education;
            $client->blood_group=$request->blood_group;
            $client->email=$request->email;
            $client->name=$request->name;
            $client->religion=$request->religion;
            $client->permanent_address_id=$PermanentID;
            $client->present_address_id=$PresentID;
            $client->political_id=$politicalID;
            $client->profession_id=$professionID;
            $client->user_id=Auth::user()->id;

            $client->save();
        }

        return redirect()->back();
    }


    public function addsms()
    {
        $user=Auth::user();
        $divisions=Division::all();
        $clientList=User::find($user->id)->clients; 
        return view('pages.entry.addsms',compact(['clientList','divisions']));
    }

    public function addemail()
    {
        $user=Auth::user();
        $divisions=Division::all();
        $clientList=Client::select(['id','name','email','contact'])->where('user_id','=',$user->id)->get();
        return view('pages.entry.addemail',compact(['clientList','divisions']));
    }

    public function showDistrict($id)
    {
        $district=District::select()->where('division_id','=',$id)->get();
        return $district;
    }


    public function showUpazilla($id)
    {
        $upazilla=Upazilla::select()->where('district_id','=',$id)->get();
        return $upazilla;
    }
    public function showPourosava($id)
    {
        $pourosava=Pourosava::select()->where('district_id','=',$id)->get();
        return $pourosava;
    }
    public function showCitycorp($id)
    {
        $citycorp=Citycorp::select()->where('division_id','=',$id)->get();
        return $citycorp;
    }

    public function getDivisionalClients($id) // 2
    { 
       $divisionclients=Division::find($id)->clients;
       return $divisionclients;
        
    }

    public function recieveSmsRequest(Request $request)
    {
        $recievedSms=new Smsdetail();
        $recievedSms->message="$request->text";
        $recievedSms->save();

        return "Success";
    }

    public function apatoto()
    {
        $divisions=Division::all();
        return view('pages.entry.apatoto',compact('divisions'));
    }

    public function apatotoStore(Request $request)
    {
        // $allclients=Client::whereHas('Muslim',function($query){
        //     return $query->where('religion','=','Muslim');
            
        // });
        // $allclients->
        // return $allclients;
    }



}
