<?php

namespace App\Http\Controllers\UserView;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data=Auth::user();
        return view('auth.myinfo.myinfo',compact('data'));
    }
}
