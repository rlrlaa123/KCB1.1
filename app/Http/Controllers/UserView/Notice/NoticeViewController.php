<?php

namespace App\Http\Controllers\Userview\Notice;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;
use Carbon\Carbon;


class NoticeViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index(Request $request)
    {
        $data = Notice::latest()->paginate(12);
        $sub_days =Carbon::now()->subDays(30);
        return view('Notice.Notice', compact('data', 'sub_days'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Notice::where('notice_id', $id)->first();
        $previous = Notice::where('notice_id', '<', $data->notice_id)->max('notice_id');
        $next = Notice::where('notice_id', '>', $data->notice_id)->min('notice_id');
        return view('Notice.detailed.notice_detailed', compact('data', 'previous', 'next'));
    }

    public function notice_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Notice::where('notice_id', $id)->first();
        $download_path = (public_path() . '/' . $data->notice_fileimage);
        return response()->download($download_path);
    }
}
