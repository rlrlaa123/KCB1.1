<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use App\Policy;
use Illuminate\Http\Request;

class PoliciesViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $data = \App\Policy::latest()->paginate(10);
        return view('Judicial.Policy', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);
        $data = Policy::where('p_id', $id)->first();
        $previous = Policy::where('p_id', '<', $data->p_id)->max('p_id');
        $next = Policy::where('p_id', '>', $data->p_id)->min('p_id');
        return view('Judicial.detailed.pdetailed', compact('data', 'previous', 'next'));
    }

    public function p_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Policy::where('p_id', $id)->first();
        $download_path = (public_path() . '/' . $data->p_fileimage);
        return response()->download($download_path);
    }
}
