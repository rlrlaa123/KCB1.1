<?php

namespace App\Http\Controllers\Userview\Library;

use App\Library;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Library::latest()->paginate(10);
        return view('library.library', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.

        $data = Library::where('library_id', $id)->first();
        $previous = Library::where('library_id', '<', $data->library_id)->max('library_id');
        $next = Library::where('library_id', '>', $data->library_id)->min('library_id');
        return view('library.detailed.library_detailed', compact('data', 'previous', 'next'));
    }

    public function library_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Library::where('library_id', $id)->first();
        $download_path = (public_path() . '/' . $data->library_fileimage);
        return response()->download($download_path);
    }
}
