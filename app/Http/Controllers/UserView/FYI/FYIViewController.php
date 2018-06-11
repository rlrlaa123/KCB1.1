<?php

namespace App\Http\Controllers\Userview\FYI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FYI;

class FYIViewController extends Controller
{
    public function index(Request $request)
    {
        $data = FYI::latest()->paginate(10);
        return view('FYI.fyi', compact('data'));
    }

    public function show($id)
    {
        $data = FYI::where('fyi_id', $id)->first();
        $previous = FYI::where('fyi_id', '<', $data->fyi_id)->max('fyi_id');
        $next = FYI::where('fyi_id', '>', $data->fyi_id)->min('fyi_id');
        return view('.FYI.detailed.fyi_detailed', compact('data', 'previous', 'next'));
    }

    public function fyi_filedownload($id)
    {
        $data = FYI::where('fyi_id', $id)->first();
        $download_path = (public_path() . '/' . $data->fyi_fileimage);
        return response()->download($download_path);
    }
    //
}
