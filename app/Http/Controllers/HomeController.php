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
        $hotfocus = HotFocus::latest()->take(6)->paginate(2);
        $fyi = FYI::latest()->take(5)->get();
        $library = Library::latest()->take(5)->get();
        return view('/main/home_temp', compact('library', 'hotfocus', 'fyi'));
    }
}
