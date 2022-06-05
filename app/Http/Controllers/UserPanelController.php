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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
