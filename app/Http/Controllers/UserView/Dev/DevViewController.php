<?php

namespace App\Http\Controllers\Userview\Dev;

use App\Dev;
use App\Http\Controllers\Controller;
use App\Location;
use App\SearchCharge;
use App\SearchType;
use Illuminate\Http\Request;

class DevViewController extends Controller
{
    public function index(){

        $search_type=SearchType::all();
        $search_charge=SearchCharge::all();
        $data=Dev::latest();
        $location=Location::all();
//        $chosen=Location::where('dev_city','$chosen')->get();
        $cities=Location::distinct()->get(['dev_city']);

        return view('Development.Dev',compact('data','location','cities', 'search_charge', 'search_type'));
    }
    public function show($id) {
        $data = Dev::where('dev_id',$id)->first();
        return view('Development.detailed.detailed',compact('data'));
    }
    public function development_filedownload($id){
        $data=Dev::where('dev_id',$id)->first();
        $download_path=(public_path().'/'.$data->dev_fileimage);
        return response()->download($download_path);
    }
    public function development_reference_download($id){
        $data=Dev::where('dev_id',$id)->first();
        $download_path=(public_path().'/'.$data->dev_reference);
        return response()->download($download_path);
    }
}

