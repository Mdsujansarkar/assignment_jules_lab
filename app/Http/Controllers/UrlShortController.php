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
            if(auth()->user()->user_role='user') {
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
            $hexadecimal = '5';
            $short_url = base_convert($hexadecimal, 10,36);
            $mainUrl->update([
                'short_url' =>$short_url
            ]);
           
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
        // $user_agent_infos = UserAgentInfo::with('userInfo')->paginate(5);

        $user_agent_infos = UserAgentInfo::with('userInfo')
                                    ->FilterByDateRangeFor($request) 
                                    ->orderBy('id','DESC')
                                    ->paginate(10);
        
        return view('backend.home.dashboard',[
            'user_agent_infos' =>$user_agent_infos 
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
        // $data = UserAgentInfo::get(['ip_address','location','latitude','longitude','browser','os_name','device'])->toArray();
        // return Excel::store('export_to_excel_example', function($excel) use ($data) {
        // $excel->sheet('mySheet', function($sheet) use ($data)
        // {
        // $sheet->fromArray($data);
        // });
        // })->download($type);
        return Excel::download(new UsersExport, 'users.xlsx');
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
