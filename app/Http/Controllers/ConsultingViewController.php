<?php

namespace App\Http\Controllers;

use App\Consulting;
use Illuminate\Http\Request;

class ConsultingViewController extends Controller
{
    public function index(){
        $data=Consulting::all();
        return view('consulting.consulting', compact('data'));
    }

    public function consulting_filedownload($id)
    {
        $data = Consulting::where('consulting_id', $id)->first();
        $download_path = (public_path() . '/' . $data->consulting_fileimage);
        return response()->download($download_path);
    }
}
