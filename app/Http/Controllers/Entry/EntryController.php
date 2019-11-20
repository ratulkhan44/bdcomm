<?php

namespace App\Http\Controllers\Entry;

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

class EntryController extends Controller
{
    public function index()
    {
        $profession_types = ProfessionType::all();
        $professionals = Professional::all();
        $business_types = BusinessType::all();
        $political_views = PoliticalView::all();
        $wings = Wing::all();
        $units = Unit::all();
        $posts = Post::all();
        return view('pages.entry.dashboard', compact('profession_types', 'professionals', 'business_types', 'political_views', 'wings', 'units', 'posts'));
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

    // Send text submission request to Admin/Staffs
    public function addsms()
    {
        $user         = Auth::user();
        $divisions    = Division::all();
        $client_list   = User::find($user->id)->clients;

        return view('pages.entry.addsms', compact(['client_list', 'divisions']));

        /*
        return App\PermanentAddr::whereHas('client', function($query){
            $village = "234324";
            $mama = $query->where('village', '=', $village);
            if(isset($div_id)) {
                $mama = $query->where('division_id', '=', $div_id);
                $mama = $query->where('district_id', '=', '1');
            }
            return $mama;
        })->get();
        */
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

    public function getFilteredClients(Request $request) {

        return Client::whereHas('permanentaddress', function($query) use($request){


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
            return $clients;

        })->get();
    }

    public function getDivisionalClients($id) // 2
    {
       $divisionclients = Division::find($id)->clients;
       return $divisionclients;

    }

    public function recieveSmsRequest(Request $request)
    {
        $message = $request->message;
        $campaign = $request->name;
        $clients = $request->clientsToText;

        $textModel = new Text();
        $textModel->message = $message;
        $textModel->save();

        if(isset($textModel->id)) {
            $campaignModel = new Campaign();
            $user = Auth::user();
            $campaignModel->name = $campaign;
            $campaignModel->text_id = $textModel->id;
            $campaignModel->user_id = $user->id;
            $campaignModel->status = 1;
            $campaignModel->save();

            if(isset($campaignModel->id)) {

                $campaign = Campaign::find($campaignModel->id);
                foreach ($clients as $client) {
                    $campaign->clients()->attach($client);
                }
            }
        }
    }

    public function showPendingCampaign() {
        $campaigns         = Campaign::all()->where('user_id', 3);

        //$texts         = Text::all();



        // $indivCampName = [];
        // $indivCampText = [];
        //
        // foreach ($campaigns as $campaign) {
        //     $name = $campaign->name;
        //     $text = Text::find($campaign->id)->campaign;
        //
        //     array_push($indivCampName, $name);
        //     array_push($indivCampText, $text);
        // }
        //
        // dd($indivCampText);


        // $textBody          = Text::find($campaigns->id)->campaign;

        return view('pages.entry.pending_campaigns', compact(['campaigns']));
    }

    public function showPendingCampaignList($id) {

         $user = Auth::user();
         $campaigns = Campaign::find($id);
         if($user->id == $campaigns->user_id) {
             $clients = $campaigns->clients;
             return view('pages.entry.pending_campaigns_list',compact('clients'));
         }
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
