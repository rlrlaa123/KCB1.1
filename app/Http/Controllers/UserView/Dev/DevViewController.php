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
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {

        $search_type = SearchType::all();
        $search_charge = SearchCharge::all();
        $data = Dev::latest();
        $location = Location::all();
//        $chosen=Location::where('dev_city','$chosen')->get();
        $cities = Location::distinct()->get(['dev_city']);

        return view('Development.Dev', compact('data', 'location', 'cities', 'search_charge', 'search_type'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);

        $data = Dev::where('dev_id', $id)->first();
        $previous = Dev::where('dev_id', '<', $data->dev_id)->max('dev_id');
        $next = Dev::where('dev_id', '>', $data->dev_id)->min('dev_id');
        return view('Development.detailed.detailed', compact('data', 'previous', 'next'));
    }

    public function development_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Dev::where('dev_id', $id)->first();
        $download_path = (public_path() . '/' . $data->dev_fileimage);
        return response()->download($download_path);
    }

    public function development_reference_filedownload($id)
    {
        $data = Dev::where('dev_id', $id)->first();
        $download_path = (public_path() . '/' . $data->dev_reference);
        return response()->download($download_path);
    }
    public function test_map(Request $request){
        return view('Development.testing');
    }
}

