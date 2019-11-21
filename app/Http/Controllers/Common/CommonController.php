<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Citycorp;
use App\Client;
use App\Campaign;
use App\District;
use App\Division;
use App\Pourosava;
use App\Text;
use App\PermanentAddress;
use App\Political;
use App\PresentAddress;
use App\Profession;
use App\Upazilla;
use App\User;
use App\ProfessionType;
use App\Professional;
use App\BusinessType;
use App\PoliticalView;
use App\Wing;
use App\Unit;
use App\Post;

use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function index()
    {
        $user         = Auth::user();


        if($user->role->type == 'Admin' || $user->role->type == 'Officestaff' ) {
            $divisions    = Division::all();
            $client_list   = Client::all();
        } else {
            $divisions    = Division::all();
            $client_list   = User::find($user->id)->clients;
        }

        return view('pages.common.filterclients', compact(['client_list', 'divisions']));
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

    public function getFilteredClients(Request $request) {

        $user         = Auth::user();

        $viewableUsers = Client::whereHas('permanentaddress', function($query) use($request, $user){

            if(!empty($request->division)) {
                $clients = $query->where('division_id', '=', $request->division);
            }

            if(!empty($request->district)) {
             $clients = $query->where('district_id', '=', $request->district);
            }

            if(!empty($request->upazilla)) {
             $clients = $query->where('upazilla_id', '=', $request->upazilla);
            }

            if(!empty($request->union)) {
             $clients = $query->where('union', '=', $request->union);
            }

            if(!empty($request->village)) {
             $clients = $query->where('village', '=', $request->village);
            }

            if($user->role->type == 'Admin' || $user->role->type == 'Officestaff' ) {
                return $clients;
            }

            $clients = $query->where('user_id', '=', $user->id);

            return $clients;

        })->get();

        return $viewableUsers;
    }

    public function showPendingCampaign() {
        $user         = Auth::user();

        if($user->role->type == 'Admin') {
            $campaigns         = Campaign::all()->where('status', 0);

            $counts = [];
            foreach ($campaigns as $camp) {
                // $counts = $camp->clients()->get();
                $countNum = $camp->clients->count();
                array_push($counts, $countNum);
            }
            return view('pages.common.pending_campaigns', compact(['campaigns', 'counts']));
        } elseif($user->role->type == 'Dataentry') {
            $campaigns = Campaign::all()->where('user_id', $user->id);
            return view('pages.common.pending_campaigns', compact(['campaigns']));
        } else {
            return redirect()->back();
        }
    }

    public function showPendingCampaignList($id) {

        $user         = Auth::user();
        $campaigns = Campaign::find($id);
        if($user->role->type == 'Admin') {
            $clients = $campaigns->clients;
            return view('pages.entry.pending_campaigns_list',compact('clients'));
        } elseif($user->role->type == 'Dataentry') {
            if($user->id == $campaigns->user_id) {
                $clients = $campaigns->clients;
                return view('pages.entry.pending_campaigns_list',compact('clients'));
            }
        } else {
            return redirect()->back();
        }
    }

    // public function permitText() {
    //     $user         = Auth::user();
    // }
}
