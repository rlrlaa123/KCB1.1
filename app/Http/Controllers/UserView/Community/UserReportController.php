<?php

namespace App\Http\Controllers\UserView\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Report;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class UserReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        return view('Report.report');
    }

    public function report_fileupload(Request $request)
    {
        $this->validate($request, [
            'report_user' => 'required|string',
            'report_title' => 'required',
            'report_user_email' => 'required|string',
            'report_password' => 'required|string|min:4|max:4',
            'report_content' => 'required',
        ]);
        $date = Carbon::now();
        $report = new Report;
        $report->report_user = $request['report_user'];
        $report->report_user_email = $request['report_user_email'];
        $report->report_title = $request['report_title'];
        $report->report_content = $request['report_content'];
        $report->report_password = bcrypt($request['report_passowrd']);
        $report->report_date = $date;

        $report->save();

        return redirect('report')->with('success', '등록완료!');

    }
}

