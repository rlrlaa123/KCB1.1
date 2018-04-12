<?php

namespace App\Http\Controllers\Admin\Judicial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JudicialController extends Controller
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
        return view('admin.judicial.judicial_info.index');
    }
}
