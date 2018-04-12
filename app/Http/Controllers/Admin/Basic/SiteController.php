<?php

namespace App\Http\Controllers\Admin\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $request->user()->authorizeRoles(['admin']);
//        return json_encode($request->user()->hasrole('admin'));
        return view('admin.basic.site_info.index');
    }
}
