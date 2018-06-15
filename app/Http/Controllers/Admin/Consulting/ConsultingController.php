<?php

namespace App\Http\Controllers\Admin\Consulting;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Consulting;
use Illuminate\Http\Request;


class ConsultingController extends Controller
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
        return view('admin.consulting.consulting');
    }

    public function consultingfileupload(Request $request)
    {
        $this->validate($request, [
            'consulting_title' => 'required',
            'consulting_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
        ]);
        if (!file_exists('fileuploaded')) {
            File::makeDirectory('fileuploaded');
            if (!file_exists('fileuploaded/consulting')) {
                File::makeDirectory('fileuploaded/consulting');
                if (!file_exists('fileuploaded/consulting/file')) {
                    File::makeDirectory('fileuploaded/consulting/file');
                }
            }
        }

        $file = $request->file('consulting_fileimage');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $date = Carbon::now();

        $destinationPath = public_path('fileuploaded/consulting/file');
        $file->move($destinationPath, $filename);

        $consulting = new Consulting;
        $consulting->consulting_title = $request['consulting_title'];
        $consulting->consulting_fileimage = 'fileuploaded/consulting/file/' . $filename;
        $consulting->consulting_date = $date;

        $consulting->save();

//        $this->postImage->add($input);

        return back()
            ->with('success', '등록완료')
            ->with('imageName', $filename);

    }
}
