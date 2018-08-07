<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function intro(){
        return view('Company_intro');
    }
    public function history(){
        return view('Company_history');
    }

}
