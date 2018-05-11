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
        return view('Judicial.detailed.pdetailed',compact('data'));
    }
    public function p_filedownload($id){
        $data=Policy::where('p_id',$id)->first();
        $download_path=(public_path().'/'.$data->p_fileimage);
        return response()->download($download_path);
    }
}
