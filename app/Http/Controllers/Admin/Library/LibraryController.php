<?php

namespace App\Http\Controllers\Admin\Library;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Library;
use Illuminate\Http\Request;
use Image;

class LibraryController extends Controller
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
    public function index()
    {
        $data = Library::all();
        return view('admin.library.library_index', compact('data'));
    }

    public function create()
    {
        $data = Library::all();
        return view('admin.library.create', compact('data'));
    }

    public function edit($id)
    {
        $data = Library::where('library_id', $id)->get()[0];
        return view('admin.library.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'library_title' => 'required',
            'library_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,svg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'library_content' => 'required',
        ]);
        if ($request->hasFile('library_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/library')) {
                    File::makeDirectory('fileuploaded/library');
                    if (!file_exists('fileuploaded/library/file')) {
                        File::makeDirectory('fileuploaded/library/file');
                    }
                }
            }
            $delete= Library::where('library_id', $id)->get()[0];
            if($delete['library_fileimage'] !=null) {
                File::delete($delete['library_fileimage']);
            }
            $image = $request->file('library_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/library/file');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/library/file/' . $imagename;
        } else
            $file = null;

        $date = Carbon::now();

        $data = Library::where('library_id', $id)
            ->update([
                'library_title' => $request['library_title'],
                'library_content' => $request['library_content'],
                'library_fileimage' => $file,
                'library_date' => $date,
            ]);


        return redirect('admin/library');
    }
    public function delete($id)
    {
        $delete = Library::where('library_id', $id)->first();
        if ($delete['library_fileimage'] != null) {
            File::delete($delete['library_fileimage']);
            File::delete($delete['library_thumbnails']);
        }
        $data = Library::where('library_id', $id)->delete();

        return response()->json([], 204);
    }


    public function libraryfileupload(Request $request)
    {
        $this->validate($request, [
            'library_title' => 'required',
            'library_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'library_content' => 'required',
        ]);
        if (!file_exists('fileuploaded')) {
            File::makeDirectory('fileuploaded');
            if (!file_exists('fileuploaded/library')) {
                File::makeDirectory('fileuploaded/library');
                if (!file_exists('fileuploaded/library/file')) {
                    File::makeDirectory('fileuploaded/library/file');
                }
            }
        }

        $image = $request->file('library_fileimage');
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $date = Carbon::now();

        $destinationPath = public_path('fileuploaded/library/file');
        $image->move($destinationPath, $imagename);

        $news = new Library;
        $news->library_title = $request['library_title'];
        $news->library_content = $request['library_content'];
        $news->library_fileimage = 'fileuploaded/library/file/' . $imagename;
        $news->library_date = $date;

        $news->save();


        return back()
            ->with('success', '등록완료')
            ->with('imageName', $imagename);

    }
}
