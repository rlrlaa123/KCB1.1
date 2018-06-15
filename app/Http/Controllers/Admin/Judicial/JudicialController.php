<?php

namespace App\Http\Controllers\Admin\Judicial;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Judicial;
use Illuminate\Http\Request;
use Image;

class JudicialController extends Controller
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
        return view('admin.judicial.judicial_info.index');
    }

    public function judicialfileupload(Request $request)
    {
        $this->validate($request, [
            'j_title' => 'required',
            'j_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,svg,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'j_content' => 'required',
            'dash_id' => 'integer'
        ]);
        if ($request->j_fileimage == null) {
            $date = Carbon::now();
            $news = new Judicial;
            $news->j_title = $request['j_title'];
            $news->dash_id = 1;
            $news->j_content = $request['j_content'];
            $news->j_fileimage = null;
            $news->j_date = $date;

            $news->save();

        } else {

            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/judicial')) {
                    File::makeDirectory('fileuploaded/judicial');
                    if (!file_exists('fileuploaded/judicial/file')) {
                        File::makeDirectory('fileuploaded/judicial/file');
                    }
                }
            }
            $image = $request->file('j_fileimage');
            $imagename = $request['j_id'] . '.' . $image->getClientOriginalExtension();

            $date = Carbon::now();
            $destinationPath = public_path('fileuploaded/judicial/file');
            $image->move($destinationPath, $imagename);

            $news = new Judicial;
            $news->j_title = $request['j_title'];
            $news->dash_id = 1;
            $news->j_content = $request['j_content'];
            $news->j_fileimage = 'fileuploaded/judicial/file/' . $imagename;
            $news->j_date = $date;

            $news->save();

        }
        return back()
            ->with('success', '4');

    }
}
