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
    public function index(Request $request)
    {
        return view('admin.library.library_index');
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

//        $this->postImage->add($input);

        return back()
            ->with('success', '등록완료')
            ->with('imageName', $imagename);

    }
//    public function store(Request $request){
//        $this->validate($request, [
//            'librarytitle'=>'required|text',
//            'library_content'=>'required|text',
//            'library_fileimage'=>'file|nullable|max:1999',
//        ]);
//        if($request->hasFile('fileimage')){
//            $filenameWithExt=$request->file('fileimage');
//        }else{
//            $fileNameToStore='noimage.jpg';
//        }
//    }
}
