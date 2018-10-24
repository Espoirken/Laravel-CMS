<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Setting;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admin.users.index')->with('users', User::all())
                                        ->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.create')->with('settings', Setting::first())
                                        ->with('user', User::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123123'),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpeg',
        ]);
           
        toastr()->success('The user added successfully!');
        return redirect()->route('users');
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
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        toastr()->error('User deleted!');
        return redirect()->back();
    }

    public function admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        toastr()->success('The user permission successfully changed to admin!');
        return redirect()->back();
    }

    public function notadmin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        toastr()->success('The admin permission successfully changed to user!');
        return redirect()->back();
    }
}
