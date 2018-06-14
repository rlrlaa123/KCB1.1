<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use App\RelatedNews;
use Illuminate\Http\Request;

class RelatedNewsUserViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = \App\RelatedNews::latest()->paginate(12);
        return view('Judicial.RelatedNews', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);
        $data = RelatedNews::where('rn_id', $id)->first();
        $previous = RelatedNews::where('rn_id', '<', $data->rn_id)->max('rn_id');
        $next = RelatedNews::where('rn_id', '>', $data->rn_id)->min('rn_id');
        return view('Judicial.detailed.rndetailed', compact('data', 'previous', 'next'));
    }

    public function rn_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = RelatedNews::where('rn_id', $id)->first();
        $download_path = (public_path() . '/' . $data->rn_fileimage);
        return response()->download($download_path);
    }
}
