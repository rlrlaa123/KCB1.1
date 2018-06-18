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

    public function index()
    {
        $data = Judicial::all();
        return view('admin.judicial.judicial_info.index', compact('data'));
    }

    public function create()
    {
        $data = Judicial::all();
        return view('admin.judicial.judicial_info.create', compact('data'));
    }

    public function edit($id)
    {
        $data = Judicial::where('j_id', $id)->get()[0];
        return view('admin.judicial.judicial_info.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'j_title' => 'required',
            'j_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,svg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'j_content' => 'required',
            'dash_id' => 'integer'
        ]);
        if ($request->hasFile('j_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/judicial')) {
                    File::makeDirectory('fileuploaded/judicial');
                    if (!file_exists('fileuploaded/judicial/file')) {
                        File::makeDirectory('fileuploaded/judicial/file');
                    }
                }
            }
            $delete= Judicial::where('j_id', $id)->get()[0];
            if($delete['j_fileimage'] !=null) {
                File::delete($delete['j_fileimage']);
            }
            $image = $request->file('j_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/judicial/file');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/judicial/file/' . $imagename;
        } else
            $file = null;

        $date = Carbon::now();

        $data = Judicial::where('j_id', $id)
            ->update([
                'j_title' => $request['j_title'],
                'j_content' => $request['j_content'],
                'dash_id'=> 1,
                'j_fileimage' => $file,
                'j_date' => $date,
            ]);


        return redirect('admin/judicial');
    }
    public function delete($id)
    {
        $data = Judicial::where('j_id', $id)->delete();

        return response()->json([], 204);
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
            $imagename = time() . '.' . $image->getClientOriginalExtension();

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
