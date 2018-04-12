<?php

namespace App\Http\Controllers\Admin\Community;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
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
        return view('admin.community.free_dashboard.index');
    }
}
