<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function intro(){
        return view('Intro.Company_intro');
    }
    public function history(){
        return view('Intro.Company_history');
    }
    public function location(){
        return view('Intro.Company_location');
    }

}
