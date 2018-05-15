<?php

namespace App\Http\Controllers\Userview\Judicial;

use App\Http\Controllers\Controller;
use App\Policy;
use Illuminate\Http\Request;

class PoliciesViewController extends Controller
{
    public function index(){
        $data=\App\Policy::latest()->paginate(10);
        return view('Judicial.Policy',compact('data'));
    }
    public function show($id){
        $data = Policy::where('p_id',$id)->first();
        $previous = Policy::where('p_id', '<', $data->p_id)->max('p_id');
        $next = Policy::where('p_id', '>', $data->p_id)->min('p_id');
        return view('Judicial.detailed.pdetailed',compact('data', 'previous', 'next'));
    }
    public function p_filedownload($id){
        $data=Policy::where('p_id',$id)->first();
        $download_path=(public_path().'/'.$data->p_fileimage);
        return response()->download($download_path);
    }
}
