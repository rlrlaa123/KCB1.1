<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\HotFocus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotFocusViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $data = HotFocus::latest()->paginate(12);
        return view('Judicial.Hotfocus', compact('data'));
    }

    public function show($id)
    {
        $data = HotFocus::where('hf_id', $id)->first();

        $previous = HotFocus::where('hf_id', '<', $data->hf_id)->max('hf_id');

        $next = HotFocus::where('hf_id', '>', $data->hf_id)->min('hf_id');

        return view('Judicial.detailed.hfdetailed', compact('data','previous','next'));
    }

    public function hf_filedownload($id)
    {
        $data = HotFocus::where('hf_id', $id)->first();
        $download_path = (public_path() . '/' . $data->hf_fileimage);
        return response()->download($download_path);
    }
}

