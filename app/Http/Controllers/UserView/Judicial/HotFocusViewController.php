<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\HotFocus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotFocusViewController extends Controller
{
    public function index()
    {
        $data = HotFocus::latest()->paginate(12);
        return view('Judicial.HotFocus', compact('data'));
    }

    public function show($id)
    {
        $data = HotFocus::where('hf_id', $id)->first();
        return view('Judicial.detailed.hfdetailed', compact('data'));
    }

    public function hf_filedownload($id)
    {
        $data = HotFocus::where('hf_id', $id)->first();
        $download_path = (public_path() . '/' . $data->hf_fileimage);
        return response()->download($download_path);
    }
}

