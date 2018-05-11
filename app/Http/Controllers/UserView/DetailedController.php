<?php

namespace App\Http\Controllers\Userview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailedController extends Controller
{

    public function index(){


        return view('Judicial.detailed',compact('data'));
    }
}
