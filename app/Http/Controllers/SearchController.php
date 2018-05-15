<?php

namespace App\Http\Controllers;

use App\Judicial;
use App\HotFocus;
use App\Policy;
use App\RelatedNews;
use App\Notice;
use App\Library;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $judicial = Judicial::where('j_title', 'like', '%' . $request . '%')->orWhere('j_content', 'like', '%' . $request . '%')
            ->orderBy('j_title')
            ->take(4)->get();
        $policy = Policy::where('p_title', 'like', '%' . $request . '%')->orWhere('p_content', 'like', '%' . $request . '%')
            ->orderBy('p_title')
            ->take(4)->get();
        $hotfocus = HotFocus::where('hf_title', 'like', '%' . $request . '%')->orWhere('hf_content', 'like', '%' . $request . '%')
            ->orderBy('hf_title')
            ->take(4)->get();
        $notice = Notice::where('notice_title', 'LIKE', '%' . $request . '%')->orWhere('notice_content', 'LIKE', '%' . $request . '%')
            ->orderBy('notice_title')
            ->take(4)->get();
        $library = Library::where('library_title', 'LIKE', '%' . $request . '%')->orWhere('library_content', 'LIKE', '%' . $request . '%')
            ->orderBy('library_title')
            ->take(4)->get();
        return view('search.search', compact('judicial', 'policy','hotfocus','notice','library'));
    }
}
