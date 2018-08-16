<?php

namespace App\Http\Controllers\Admin\Judicial;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\RelatedNews;
use Illuminate\Http\Request;
use Image;

class RelatedNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = RelatedNews::all();
        return view('admin.judicial.relatednews_info.index', compact('data'));
    }

    public function create()
    {
        $data = RelatedNews::all();
        return view('admin.judicial.relatednews_info.create', compact('data'));
    }

    public function edit($id)
    {
        $data = RelatedNews::where('rn_id', $id)->get()[0];
        return view('admin.judicial.relatednews_info.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'rn_title' => 'required',
            'rn_fileimage' => 'nullable|max:10000|mimes:gif,jpeg,jpg,svg,png,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'rn_content' => 'required',
            'rn_link' => 'string|nullable',
            'dash_id' => 'integer'
        ]);
        if ($request->hasFile('rn_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/relatednews')) {
                    File::makeDirectory('fileuploaded/relatednews');
                    if (!file_exists('fileuploaded/relatednews/images')) {
                        File::makeDirectory('fileuploaded/relatednews/images');
                    }
                }
            }
            $delete= RelatedNews::where('rn_id', $id)->get()[0];
            if($delete['rn_fileimage'] !=null) {
                File::delete($delete['rn_fileimage']);
            }
            $image = $request->file('rn_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/relatednews/images');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/relatednews/images/' . $imagename;
        } else
            $file = null;

        $date = Carbon::now();

        $data = RelatedNews::where('rn_id', $id)
            ->update([
                'rn_title' => $request['rn_title'],
                'rn_content' => $request['rn_content'],
                'dash_id'=> 4,
                'rn_link' => $request['rn_link'],
                'rn_fileimage' => $file,
                'rn_date' => $date,
            ]);


        return redirect('admin/relatednews');
    }
    public function delete($id)
    {
        $delete = RelatedNews::where('rn_id', $id)->first();
        if ($delete['rn_fileimage'] != null) {
            File::delete($delete['rn_fileimage']);
        }
        $data = RelatedNews::where('rn_id', $id)->delete();

        return response()->json([], 204);
    }


    public function relatednewsfileupload(Request $request)
    {
        $this->validate($request, [
            'rn_title' => 'required',
            'rn_fileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'rn_content' => 'required',
            'rn_link' => 'string|nullable',
            'dash_id' => 'integer'
        ]);
        if ($request->rn_fileimage == null) {
            $date = Carbon::now();
            $news = new RelatedNews;
            $news->rn_title = $request['rn_title'];
            $news->rn_link = $request['rn_link'];
            $news->dash_id = 4;
            $news->rn_content = $request['rn_content'];
            $news->rn_fileimage = null;
            $news->rn_date = $date;

            $news->save();

        } else {

            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/relatednews')) {
                    File::makeDirectory('fileuploaded/relatednews');
                    if (!file_exists('fileuploaded/relatednews/images')) {
                        File::makeDirectory('fileuploaded/relatednews/images');
                    }
                }
            }
            $image = $request->file('rn_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $date = Carbon::now();
            $destinationPath = public_path('fileuploaded/relatednews/images');
            $image->move($destinationPath, $imagename);

            $news = new RelatedNews;
            $news->rn_title = $request['rn_title'];
            $news->rn_link = $request['rn_link'];
            $news->dash_id = 4;
            $news->rn_content = $request['rn_content'];
            $news->rn_fileimage = 'fileuploaded/relatednews/images/' . $imagename;
            $news->rn_date = $date;

            $news->save();

        }
        return back()
            ->with('success', '4');

    }



//    public function index(){
//        $data=\App\RelatedNews::latest()->paginate(12);
//        return view('Judicial.RelatedNews',compact('data'));
//    }
}
