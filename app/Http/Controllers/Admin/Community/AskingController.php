<?php

namespace App\Http\Controllers\Admin\Community;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Asking;
use Illuminate\Http\Request;

class AskingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data=Asking::latest()->paginate(10);

        return view('admin.community.asking.index', compact('data'));
    }

    public function show($id)
    {
        $data = Asking::where('id', $id)->first();
        $previous = Asking::where('id', '<', $data->id)->max('id');
        $next = Asking::where('id', '>', $data->id)->min('id');
        return view('admin.community.asking.asking_detailed',compact('data', 'previous', 'next'));
    }
    public function asking_filedownload($id)
    {
        $data = Asking::where('id', $id)->first();
        $download_path = (public_path() . '/' . $data->asking_file);
        return response()->download($download_path);
    }

}