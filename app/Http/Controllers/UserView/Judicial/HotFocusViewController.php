<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\HotFocus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotFocusViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = HotFocus::latest()->paginate(12);
        return view('Judicial.Hotfocus', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);
        $data = HotFocus::where('hf_id', $id)->first();

        $previous = HotFocus::where('hf_id', '<', $data->hf_id)->max('hf_id');

        $next = HotFocus::where('hf_id', '>', $data->hf_id)->min('hf_id');

        return view('Judicial.detailed.hfdetailed', compact('data', 'previous', 'next'));
    }

    public function hf_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = HotFocus::where('hf_id', $id)->first();
        $download_path = (public_path() . '/' . $data->hf_fileimage);
        return response()->download($download_path);
    }
}

