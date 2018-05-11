<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use App\RelatedNews;
use Illuminate\Http\Request;

class RelatedNewsUserViewController extends Controller
{
    public function index()
    {
        $data = \App\RelatedNews::latest()->paginate(12);
        return view('Judicial.RelatedNews', compact('data'));
    }

    public function show($id) {
        $data = RelatedNews::where('rn_id',$id)->first();
        return view('Judicial.detailed.rndetailed',compact('data'));
    }
    public function rn_filedownload($id){
        $data=RelatedNews::where('rn_id',$id)->first();
        $download_path=(public_path().'/'.$data->rn_fileimage);
        return response()->download($download_path);
    }
}
