<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use Session;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function update(Request $request){
        $this->validate($request, [
            'site_name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
        ]);
        $settings = Setting::first();
        
        $settings->site_name = $request->site_name;
        $settings->address = $request->address;
        $settings->contact_number = $request->contact_number;
        $settings->contact_email = $request->contact_email;
            
        $settings->save();

        toastr()->success('The settings is successfully updated!');
        return redirect()->back();
    }
    public function index(){
        return view('admin.settings.setting')->with('settings', Setting::first())
                                            ->with('user', User::first());
    }
}
