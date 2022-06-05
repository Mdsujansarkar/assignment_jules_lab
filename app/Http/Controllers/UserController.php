<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return view('backend.auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'name' => 'required',
        ]);

        $user = new User();      
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_role = $request->user_role;
        $user->save();
        return redirect('/user/add')->with('message','Login Create Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credinsial = $request->only('email','password');
        $user_role =User::where('user_role','admin')->first();
         
         if($user_role->user_role=='admin'){
            if(auth()->attempt($credinsial)){
                return redirect('/admin')->with('message','Login Create Successfully');
            }else{
                return back();
            }
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credinsial = $request->only('email','password');
        if(auth()->attempt($credinsial)){
            return redirect('/')->with('message','Login Create Successfully');
        }else{
            return back()->with('message','Login Not Successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userAdd()
    {
        return view('backend.auth.userLogin');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
