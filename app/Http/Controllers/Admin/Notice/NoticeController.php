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

    public function index()
    {
        $data = Notice::all();
        return view('admin.notice.notice_index', compact('data'));
    }

    public function create()
    {
        $data = Notice::all();
        return view('admin.notice.create', compact('data'));
    }

    public function edit($id)
    {
        $data = Notice::where('notice_id', $id)->get()[0];
        return view('admin.notice.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'notice_title' => 'required',
            'notice_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'notice_content' => 'required',
        ]);
        if ($request->hasFile('notice_fileimage')) {
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
            $delete= Notice::where('notice_id', $id)->get()[0];
            if($delete['notice_fileimage'] !=null) {
                File::delete($delete['notice_fileimage']);
                File::delete($delete['notice_thumbnails']);
            }
            $image = $request->file('notice_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/notice/thumbnails');
            $thumbnails = Image::make($image->getRealPath());
            $thumbnails->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imagename);

            $destinationPath = public_path('fileuploaded/notice/images');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/notice/images/' . $imagename;
            $file_1 = 'fileuploaded/notice/thumbnails/'.$imagename;
        } else {
            $file = null;
            $file_1=null;
        }
        $date = Carbon::now();

        $data = Notice::where('notice_id', $id)
            ->update([
                'notice_title' => $request['notice_title'],
                'notice_content' => $request['notice_content'],
                'notice_fileimage' => $file,
                'notice_thumbnails' => $file_1,
                'notice_date' => $date
            ]);


        return redirect('admin/notice');
    }
    public function delete($id)
    {
        $data = Notice::where('notice_id', $id)->delete();

        return response()->json([], 204);
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
