<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class EmailController extends Controller
{
    public function subscribe(){
        $email = request('email');
    
        Newsletter::subscribe($email);
        toastr()->success('Successfully subscribed!');
        return redirect()->back();
    }
}
