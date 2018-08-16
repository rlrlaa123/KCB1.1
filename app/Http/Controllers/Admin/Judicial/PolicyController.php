<?php

namespace App\Http\Controllers\Admin\Judicial;


use App\Policy;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
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
    public function index()
    {
        $data = Policy::all();
        return view('admin.judicial.policy_info.index', compact('data'));
    }

    public function create()
    {
        $data = Policy::all();
        return view('admin.judicial.policy_info.create', compact('data'));
    }

    public function edit($id)
    {
        $data = Policy::where('p_id', $id)->get()[0];
        return view('admin.judicial.policy_info.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'p_title' => 'required',
            'p_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,svg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'p_content' => 'required',
            'dash_id' => 'integer'
        ]);
        if ($request->hasFile('p_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/policy')) {
                    File::makeDirectory('fileuploaded/policy');
                    if (!file_exists('fileuploaded/policy/file')) {
                        File::makeDirectory('fileuploaded/policy/file');
                    }
                }
            }
            $delete= Policy::where('p_id', $id)->get()[0];
            if($delete['p_fileimage'] !=null) {
                File::delete($delete['p_fileimage']);
            }
            $image = $request->file('p_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/policy/file');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/policy/file/' . $imagename;
        } else
            $file = null;


        $data = Policy::where('p_id', $id)
            ->update([
                'p_title' => $request['p_title'],
                'p_content' => $request['p_content'],
                'p_fileimage' => $file,
            ]);


        return redirect('admin/policy');
    }

    public function delete($id)
    {
        $delete = Policy::where('p_id', $id)->first();
        if ($delete['p_fileimage'] != null) {
            File::delete($delete['p_fileimage']);
        }
        $data = Policy::where('p_id', $id)->delete();

        return response()->json([], 204);
    }

    /*--------------------------------------------------------------------------------------------------------------*/

    public function policyfileupload(Request $request)
    {
        $this->validate($request, [
            'p_title' => 'required',
            'p_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,svg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'p_content' => 'required',
            'dash_id' => 'integer'
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
            $imagename = time() . '.' . $image->getClientOriginalExtension();

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

}
