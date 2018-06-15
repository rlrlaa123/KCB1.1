<?php

namespace App\Http\Controllers\Admin\Judicial;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\HotFocus;
use Illuminate\Http\Request;
use Image;

class HotFocusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        return view('admin.judicial.hotfocus_info.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotfocusfileupload(Request $request)
    {
        $this->validate($request, [
            'hf_title' => 'required',
            'hf_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hf_content' => 'required',
            'dash_id' => 'integer'
        ]);

        if (!file_exists('fileuploaded')) {
            File::makeDirectory('fileuploaded');
            if (!file_exists('fileuploaded/judicial')) {
                File::makeDirectory('fileuploaded/judicial');
                if (!file_exists('fileuploaded/judicial/file')) {
                    File::makeDirectory('fileuploaded/judicial/file');
                }
            }
        }

        $image = $request->file('hf_fileimage');
        $imagename = time(). '.' . $image->getClientOriginalExtension();

        $date = Carbon::now();

        $destinationPath = public_path('fileuploaded/hotfocus/thumbnails');
        $thumbnails = Image::make($image->getRealPath());
        $thumbnails->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imagename);

        $destinationPath = public_path('fileuploaded/hotfocus/images');
        $image->move($destinationPath, $imagename);

        $news = new HotFocus;
        $news->hf_title = $request['hf_title'];
        $news->dash_id = 2;
        $news->hf_content = $request['hf_content'];
        $news->hf_fileimage = 'fileuploaded/hotfocus/images/' . $imagename;
        $news->hf_thumbnails = 'fileuploaded/hotfocus/thumbnails/' . $imagename;
        $news->hf_date = $date;

        $news->save();

//        $this->postImage->add($input);
        return back()
            ->with('success', '2');
    }

}
