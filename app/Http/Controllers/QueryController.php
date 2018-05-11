<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function search(Request $request){
        $query= $request->search;//검색 값
        $articles=DB::table('articles')->where('title', 'LIKE', '%'.$query.'%')->orWhere('content', 'LIKE', '%'.$query.'%')->get();//쿼리문 결과
        return view('layouts.navbar.action_page', compact('articles','query'));

    }
    public function index(){

    }
}
