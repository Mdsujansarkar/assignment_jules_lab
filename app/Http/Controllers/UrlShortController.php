<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\UrlShorts;
use Illuminate\Http\Request;

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
    public function store(ShortRequest $request)
    {
        if($request->main_url) {
            $mainUrl = UrlShorts::create([
                'main_url' => $request->main_url
            ]);
        }
        if($mainUrl) {
            $hexadecimal = '5';
            $short_url = base_convert($hexadecimal, 10,36);
            $mainUrl->update([
                'short_url' =>$short_url
            ]);
            return redirect()->back()->with('success','Your Short URL'. url($short_url));
        }
        return back();
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
