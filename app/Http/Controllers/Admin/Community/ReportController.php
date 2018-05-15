<?php

namespace App\Http\Controllers\Admin\Community;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
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
    public function index(Request $request){
        $data=Report::latest()->paginate(10);
        return view('admin.community.report.index', compact('data'));
    }

    public function show($id)
    {
        $data = Report::where('report_id',$id)->first();
        $previous = Report::where('report_id', '<', $data->report_id)->max('report_id');
        $next = Report::where('report_id', '>', $data->report_id)->min('report_id');
        return view('.admin.community.report.report_detailed',compact('data', 'previous', 'next'));
    }

}