<?php

namespace App\Http\Controllers\Userview\Library;

use App\Library;
use App\Http\Controllers\Controller;

class LibraryViewController extends Controller
{
    public function index()
    {
        $data = Library::latest()->paginate(10);
        return view('library.library', compact('data'));
    }

    public function show($id)
    {
        $data = Library::where('library_id', $id)->first();
        return view('library.detailed.library_detailed', compact('data'));
    }

    public function library_filedownload($id)
    {
        $data = Library::where('library_id', $id)->first();
        $download_path = (public_path() . '/' . $data->library_fileimage);
        return response()->download($download_path);
    }
}
