<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\UserAgentInfo;
use App\Models\UrlShorts;
use Stevebauman\Location\Facades\Location;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $agent = new Agent();
       $ip = request()->ip();
       $currentUserInfo = Location::get('103.112.206.10');
         $auth_id = auth()->user()->id;
         $user_id = UrlShorts::where('user_id', $auth_id)->first();
        $userAgent = new UserAgentInfo();
        $userAgent->ip_address =$ip;
        $userAgent->location =$currentUserInfo->countryName;
        $userAgent->user_id =$user_id['user_id'];
        $userAgent->latitude =$currentUserInfo->latitude;
        $userAgent->longitude =$currentUserInfo->longitude;
        $userAgent->browser =$agent->browser();
        $userAgent->os_name =$agent->platform();
        $userAgent->device =$agent->device();
        $userAgent->save();

       return view('frontend.userPanel.userPanel');
    }
}
