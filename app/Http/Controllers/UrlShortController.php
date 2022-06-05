<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\UrlShorts;
use App\Models\User;
use App\Models\UserAgentInfo;
use Illuminate\Http\Request;
use Excel;
use App\Exports\UsersExport;
use Session;
use Cache;


class UrlShortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.home.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminLogin()
    {
        return view('backend.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShortRequest $request)
    {
        if($request->main_url) {
            if(auth()->user()) {
                $mainUrl = auth()->user()->links()->create([
                    'main_url' => $request->main_url
                ]);
            } else {
                $mainUrl = UrlShorts::create([
                    'main_url' => $request->main_url
                ]);
            }
        }
        if($mainUrl) {
            
            $short_url = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $mainUrl->update([
                'short_url' =>$short_url
            ]);
             Cache::put('url', url($short_url), 1);
           
            return redirect()->back()->with('success', url($short_url));
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminDashboard(Request $request)
    {
        $urlShortInfo = UrlShorts::paginate(10);

        $user_agent_infos = UserAgentInfo::with('userInfo')
                                    ->FilterByDateRangeFor($request) 
                                    ->orderBy('id','DESC')
                                    ->paginate(10);
        
        return view('backend.home.dashboard',[
            'user_agent_infos' =>$user_agent_infos,
            'urlShortInfo'  =>$urlShortInfo 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function sessionTime($id)
    {
        
    }
}
