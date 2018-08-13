<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Judicial;
use App\HotFocus;
use App\RelatedNews;
use App\FYI;
use App\Policy;
use App\Notice;
use App\Library;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $requests = $request;
        $judicial = Judicial::where('j_title', 'like', "%{$request->search}%")
            ->orWhere('j_content', 'like', "%{$request->search}%")
            ->orderBy('j_title')->get();
        $policy = Policy::where('p_title', 'like', "%{$request->search}%")->orWhere('p_content', 'like', "%{$request->search}%")
            ->orderBy('p_title')
            ->take(4)->get();
        $notice = Notice::where('notice_title', 'LIKE', "%{$request->search}%")->orWhere('notice_content', 'LIKE', "%{$request->search}%")
            ->orderBy('notice_title')
            ->take(4)->get();
        $library = Library::where('library_title', 'LIKE', "%{$request->search}%")->orWhere('library_content', 'LIKE', "%{$request->search}%")
            ->orderBy('library_title')
            ->take(4)->get();
        $sub_days = Carbon::now()->subDays(30);
        return view('search.search', compact('requests', 'judicial', 'policy', 'notice', 'library','sub_days'));
    }

    public function j_search(Request $request)
    {
        $requests = $request;
        $judicial = Judicial::where('j_title', 'LIKE', "%{$request->search}%")->orWhere('j_content', 'LIKE', "%{$request->search}%")
            ->orderBy('j_title')->paginate(12);
        return view('Judicial.search.Judicial', compact('requests', 'judicial'));
    }

    public function p_search(Request $request)
    {
        $requests = $request;
        $policy = Policy::where('p_title', 'LIKE', "%{$request->search}%")->orWhere('p_content', 'LIKE', "%{$request->search}%")
            ->orderBy('p_title')->paginate(12);
        return view('Judicial.search.Policy', compact('requests', 'policy'));
    }

    public function hf_search(Request $request)
    {
        $requests = $request;
        $hotfocus = HotFocus::where('hf_title', 'LIKE', "%{$request->search}%")->orWhere('hf_content', 'LIKE', "%{$request->search}%")
            ->orderBy('hf_title')->paginate(12);
        return view('Judicial.search.Hotfocus', compact('requests', 'hotfocus'));
    }

    public function relatednews_search(Request $request)
    {
        $requests = $request;
        $relatednews = RelatedNews::where('rn_title', 'LIKE', "%{$request->search}%")->orWhere('rn_content', 'LIKE', "%{$request->search}%")
            ->orderBy('rn_title')->paginate(12);
        return view('Judicial.search.RelatedNews', compact('requests', 'relatednews'));
    }

    public function fyi_search(Request $request)
    {
        $requests = $request;
        $fyi = FYI::where('fyi_title', 'LIKE', "%{$request->search}%")->orWhere('fyi_content', 'LIKE', "%{$request->search}%")
            ->orderBy('fyi_title')->paginate(12);
        return view('FYI.search.fyi', compact('requests', 'fyi'));
    }

    public function notice_search(Request $request)
    {
        $data=Notice::latest()->where('notice_title', 'LIKE', "%{$request->search}%")
            ->orWhere('notice_content', 'LIKE', "%{$request->search}%")
            ->orWhere('location', 'LIKE', "%{$request->search}%")
            ->orderBy('notice_title')->paginate(12);
        $sub_days = Carbon::now()->subDays(30);
        return view('Notice.search.Notice', compact('data','sub_days'));
    }
    public function notice_all_search(Request $request)
    {
        $data=Notice::latest()->where('notice_title', 'LIKE', "%{$request->search}%")
            ->orWhere('notice_content', 'LIKE', "%{$request->search}%")
            ->orWhere('location', 'LIKE', "%{$request->search}%")
            ->orderBy('notice_title')->paginate(12);
        $sub_days = Carbon::now()->subDays(30);
        return view('Notice.search.Notice_all', compact('data','sub_days'));
    }

    public function library_search(Request $request)
    {
        $requests = $request;
        $library = Library::where('library_title', 'LIKE', "%{$request->search}%")->orWhere('library_content', 'LIKE', "%{$request->search}%")
            ->orderBy('library_title')->paginate(12);
        return view('library.search.library', compact('requests', 'library'));
    }
}
