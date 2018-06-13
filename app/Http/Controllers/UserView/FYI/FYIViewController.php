<?php

namespace App\Http\Controllers\Userview\FYI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FYI;

class FYIViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = FYI::latest()->paginate(10);
        return view('FYI.fyi', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);

        $data = FYI::where('fyi_id', $id)->first();
        $previous = FYI::where('fyi_id', '<', $data->fyi_id)->max('fyi_id');
        $next = FYI::where('fyi_id', '>', $data->fyi_id)->min('fyi_id');
        return view('.FYI.detailed.fyi_detailed', compact('data', 'previous', 'next'));
    }

    public function fyi_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = FYI::where('fyi_id', $id)->first();
        $download_path = (public_path() . '/' . $data->fyi_fileimage);
        return response()->download($download_path);
    }
    //
}
