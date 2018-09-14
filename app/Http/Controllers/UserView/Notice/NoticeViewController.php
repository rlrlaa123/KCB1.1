<?php

namespace App\Http\Controllers\Userview\Notice;

use App\Http\Controllers\Controller;
use App\Notice;
use App\Notice_photo;
use App\Notice_file;
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
        $data = Notice::where('classification', "today")->latest()->paginate(12);
        $sub_days = Carbon::now()->subDays(30);
        return view('Notice.Notice', compact('data', 'sub_days'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Notice::where('id', $id)->first();
        $data1 = Notice_photo::where('notice_id', $id)->get();
        $file = Notice_file::where('notice_id', $id)->get();
        $previous = Notice::where('id', '<', $data->id)->max('id');
        $next = Notice::where('id', '>', $data->id)->min('id');
        return view('Notice.detailed.notice_detailed', compact('data', 'previous', 'next', 'data1','file'));
    }
    public function index_all(Request $request)
    {
        $data = Notice::where('classification', "all")->orderBy('location')->paginate(12);
        $sub_days = Carbon::now()->subDays(30);
        return view('Notice.Notice_all', compact('data', 'sub_days'));
    }

    public function notice_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $file = Notice_file::where('id', $id)->first();

        $download_path = (public_path() . '/' . $file->file);
        return response()->download($download_path);

    }
}
