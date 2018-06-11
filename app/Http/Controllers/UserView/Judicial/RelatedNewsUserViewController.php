<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use App\RelatedNews;
use Illuminate\Http\Request;

class RelatedNewsUserViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    public function index()
    {
        $data = \App\RelatedNews::latest()->paginate(12);
        return view('Judicial.RelatedNews', compact('data'));
    }

    public function show($id) {
        $data = RelatedNews::where('rn_id',$id)->first();
        $previous = RelatedNews::where('rn_id', '<', $data->rn_id)->max('rn_id');
        $next = RelatedNews::where('rn_id', '>', $data->rn_id)->min('rn_id');
        return view('Judicial.detailed.rndetailed',compact('data', 'previous','next'));
    }
    public function rn_filedownload($id){
        $data=RelatedNews::where('rn_id',$id)->first();
        $download_path=(public_path().'/'.$data->rn_fileimage);
        return response()->download($download_path);
    }
}
