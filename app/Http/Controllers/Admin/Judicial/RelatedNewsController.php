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
    public function index(Request $request){
        return view('admin.judicial.relatednews_info.index');
    }

    public function relatednewsfileupload(Request $request)
    {
        $this->validate($request, [
            'rn_title' => 'required',
            'rn_fileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rn_content'=>'required',
            'rn_link'=>'string|nullable',
            'dash_id'=>'integer'
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
            $imagename =time(). '.' . $image->getClientOriginalExtension();

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
