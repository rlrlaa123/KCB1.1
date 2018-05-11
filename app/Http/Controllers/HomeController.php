<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\HotFocus;
use App\FYI;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $request->user()->authorizeRoles('user');
//        return json_encode($request->user()->hasrole('admin'));
        $hotfocus = HotFocus::latest(5);
        $fyi = FYI::latest(5);
        $library = Library::latest(5);
        return view('/main/home', compact('library', 'hotfocus', 'fyi'));
    }
}
