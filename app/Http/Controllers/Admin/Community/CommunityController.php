<?php

namespace App\Http\Controllers\Admin\Community;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;

class CommunityController extends Controller
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
        $data=Article::latest()->paginate(10);

        return view('admin.community.community.index', compact('data'));
    }

    public function show($id)
    {
        $data = Article::where('id', $id)->first();
        $previous = Article::where('id', '<', $data->id)->max('id');
        $next = Article::where('id', '>', $data->id)->min('id');
        return view('admin.community.community.community_detailed',compact('data', 'previous', 'next'));
    }
    public function destroy(\App\Article $article)
    {
        $this->authorize('delete', $article);
//      $article->delete();
//      return response()->json([],204);
    }

}