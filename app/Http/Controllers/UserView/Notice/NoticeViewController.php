<?php

namespace App\Http\Controllers\Userview\Notice;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;
use Carbon\Carbon;


class NoticeViewController extends Controller
{
    public function index(Request $request)
    {
        $notexpired = Notice::where('created_at','>',Carbon::now()->subDays(30));
        $data = Notice::latest()->paginate(12);
        return view('Notice.Notice',compact('data','notexpired'));
    }
    public function show($id)
    {
        $data = Notice::where('notice_id',$id)->first();
        return view('Notice.detailed.notice_detailed',compact('data'));
    }
    public function notice_filedownload($id){
        $data = Notice::where('notice_id', $id)->first();
        $download_path=(public_path().'/'.$data->notice_fileimage);
        return response()->download($download_path);
    }
}
