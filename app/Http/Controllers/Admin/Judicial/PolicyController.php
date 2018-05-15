<?php

namespace App\Http\Controllers\Admin\Judicial;


use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Policy;
use Illuminate\Http\Request;
use Image;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index(Request $request){
        return view('admin.judicial.policy_info.index');
    }

    public function policyfileupload(Request $request)
    {
        $this->validate($request, [
            'p_title' => 'required',
            'p_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,svg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'p_content'=>'required',
            'dash_id'=>'integer'
        ]);
        if ($request->p_fileimage == null) {
            $date = Carbon::now();
            $news = new Policy;
            $news->p_title = $request['p_title'];
            $news->dash_id = 3;
            $news->p_content = $request['p_content'];
            $news->p_fileimage = null;
            $news->p_date = $date;

            $news->save();

        } else {

            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/policy')) {
                    File::makeDirectory('fileuploaded/policy');
                    if (!file_exists('fileuploaded/policy/file')) {
                        File::makeDirectory('fileuploaded/policy/file');
                    }
                }
            }
            $image = $request->file('p_fileimage');
            $imagename = $request['p_title'] . '.' . $image->getClientOriginalExtension();

            $date = Carbon::now();
            $destinationPath = public_path('fileuploaded/policy/file');
            $image->move($destinationPath, $imagename);

            $news = new Policy;
            $news->p_title = $request['p_title'];
            $news->dash_id = 3;
            $news->p_content = $request['p_content'];
            $news->p_fileimage = 'fileuploaded/policy/file/' . $imagename;
            $news->p_date = $date;

            $news->save();

        }
        return back()
            ->with('success', '4');

    }

//        if(!file_exists('fileuploaded')) {
//            File::makeDirectory('fileuploaded');
//            if (!file_exists('fileuploaded/policy')) {
//                File::makeDirectory('fileuploaded/policy');
//                if (!file_exists('fileuploaded/policy/file')) {
//                    File::makeDirectory('fileuploaded/policy/file');
//                }
//            }
//        }
//
//        $image = $request->file('p_fileimage');
//        $imagename = $request['p_title'].'.'.$image->getClientOriginalExtension();
//
//        $date=Carbon::now();
//
//        $destinationPath = public_path('fileuploaded/policy/file');
//        $image->move($destinationPath, $imagename);
//
//        $news = new Policy;
//        $news->p_title=$request['p_title'];
//        $news->dash_id= 3;
//        $news->p_content= $request['p_content'];
//        $news->p_fileimage = 'fileuploaded/policy/file/'.$imagename;
//        $news->p_date=$date;
//
//        $news->save();
//
//        return back()
//            ->with('success','3');
//
//    }
//    public function store(Request $request){
//        $this->validate($request, [
//            'title'=>'required|text',
//            'content'=>'required|text',
//            'dash_id'=>'required|integer',
//            'fileimage'=>'image|nullable|max:1999',
//        ]);
//        if($request->hasFile('fileimage')){
//            $filenameWithExt=$request->file('fileimage');
//        }else{
//            $fileNameToStore='noimage.jpg';
//        }
//    }

}
