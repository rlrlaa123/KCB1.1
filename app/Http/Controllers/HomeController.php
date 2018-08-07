<?php

namespace App\Http\Controllers;

use App\RelatedNews;
use Illuminate\Http\Request;
use App\HotFocus;
use App\Notice;

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
        $hotfocus = HotFocus::latest()->latest()->take(2);
        $notice = Notice::latest()->take(5)->get();
        $relatednews = RelatedNews::latest()->take(5)->get();
        return view('/main/home', compact('relatednews', 'hotfocus', 'notice'));
    }
}
