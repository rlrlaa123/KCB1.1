<?php

namespace App\Http\Controllers\Admin\Notice;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;
use Image;

class NoticeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        return view('admin.notice.notice_index');
    }

    public function noticefileupload(Request $request)
    {
        $this->validate($request, [
            'notice_title' => 'required',
            'notice_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'notice_content' => 'required',
        ]);

        if (!file_exists('fileuploaded')) {
            File::makeDirectory('fileuploaded');
            if (!file_exists('fileuploaded/notice')) {
                File::makeDirectory('fileuploaded/notice');
                if (!file_exists('fileuploaded/notice/thumbnails')) {
                    File::makeDirectory('fileuploaded/notice/thumbnails');
                }
                if (!file_exists('fileuploaded/notice/images')) {
                    File::makeDirectory('fileuploaded/notice/images');
                }
            }
        }

        $image = $request->file('notice_fileimage');
        $imagename = time(). '.' . $image->getClientOriginalExtension();

        $date = Carbon::now();

        $destinationPath = public_path('fileuploaded/notice/thumbnails');
        $thumbnails = Image::make($image->getRealPath());
        $thumbnails->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imagename);

        $destinationPath = public_path('fileuploaded/notice/images');
        $image->move($destinationPath, $imagename);

        $news = new Notice;
        $news->notice_title = $request['notice_title'];
        $news->notice_content = $request['notice_content'];
        $news->notice_fileimage = 'fileuploaded/notice/images/' . $imagename;
        $news->notice_thumbnails = 'fileuploaded/notice/thumbnails/' . $imagename;
        $news->notice_date = $date;

        $news->save();

//        $this->postImage->add($input);

        return back()
            ->with('success', '등록완료')
            ->with('imageName', $imagename);


    }

}
