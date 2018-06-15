<?php

namespace App\Http\Controllers\Admin\FYI;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\FYI;
use Illuminate\Http\Request;
use Image;

class FYIController extends Controller
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
        return view('admin.fyi.fyi_index');
    }

    public function fyifileupload(Request $request)
    {
        $this->validate($request, [
            'fyi_title' => 'required',
            'fyi_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'fyi_content' => 'required',
        ]);
        $news = new FYI;
        if ($request->hasFile('fyi_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/fyi')) {
                    File::makeDirectory('fileuploaded/fyi');
                    if (!file_exists('fileuploaded/fyi/file')) {
                        File::makeDirectory('fileuploaded/fyi/file');
                    }
                }
            }

            $image = $request->file('fyi_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/fyi/file');
            $image->move($destinationPath, $imagename);

            $news->fyi_fileimage = 'fileuploaded/fyi/file/' . $imagename;
        } else
            $news->fyi_fileimage = null;

        $date = Carbon::now();

        $news->fyi_title = $request['fyi_title'];
        $news->fyi_content = $request['fyi_content'];
        $news->fyi_date = $date;

        $news->save();

//        $this->postImage->add($input);

        return back()
            ->with('success', '등록완료');

    }
}