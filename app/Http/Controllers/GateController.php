<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GateController extends Controller
{
    public function redirectTo()
    {
        if(request()->user()->role == 1) {
            return redirect('/admin');
        }

        if(request()->user()->role == 2) {
            return redirect('/lecture');
        }

        if(request()->user()->role == 3) {
            return redirect('/student');
        }
        
    }
}
