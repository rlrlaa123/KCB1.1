<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Judicial;

class JudicialViewController extends Controller
{
    public function index(Request $request)
    {
        $data = \App\Judicial::latest()->paginate(10);
        return view('Judicial.Judicial', compact('data'));
    }

    public function show($id)
    {
        $data = Judicial::where('j_id', $id)->first();
        $previous = Judicial::where('j_id', '<', $data->j_id)->max('j_id');
        $next = Judicial::where('j_id', '>', $data->j_id)->min('j_id');
        return view('.Judicial.detailed.jdetailed', compact('data', 'previous', 'next'));
    }

    public function j_filedownload($id)
    {
        $data = Judicial::where('j_id', $id)->first();
        $download_path = (public_path() . '/' . $data->j_fileimage);
        return response()->download($download_path);
    }
    //
}
