<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Judicial;

class JudicialViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = \App\Judicial::latest()->paginate(10);
        return view('Judicial.Judicial', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);
        $data = Judicial::where('j_id', $id)->first();
        $previous = Judicial::where('j_id', '<', $data->j_id)->max('j_id');
        $next = Judicial::where('j_id', '>', $data->j_id)->min('j_id');
        return view('.Judicial.detailed.jdetailed', compact('data', 'previous', 'next'));
    }

    public function j_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Judicial::where('j_id', $id)->first();
        $download_path = (public_path() . '/' . $data->j_fileimage);
        return response()->download($download_path);
    }
    //
}
