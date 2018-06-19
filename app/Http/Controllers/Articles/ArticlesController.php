<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Auth\Access\AuthorizationException;
use \Illuminate\Validation\Validator;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        $articles = Article::latest()->paginate(10);
//       dd(view('articles.index', compact('articles'))->render());
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article;
        return view('articles.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
//        $article=User::find(1)->articles()->create($request->all());
        $article = $request->user()->articles()->create($request->all());
        if (!$article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }
        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $id;
//        return json_encode($article[1]);
//        return $article;

        $previous = Article::where('id', '<', $id)->max('id');
        $next = Article::where('id', '>', $id)->min('id');
        return view('articles.show', compact('article', 'previous', 'next'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id == $article->user->id) {
            return view('articles.edit', compact('article'));
        } else {

            return back();
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        $article->update($request->all());

        return redirect(route('articles.show', $article->id))->with('success', '수정하신 내용을 저장했습니다.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Article $article)
    {
        if (Auth::user()->id == $article->user->id||Auth::user()->roles()->admin) {
            $article->delete();

            return response()->json([], 204);
        } else {
            return back();
        }

    }

}
