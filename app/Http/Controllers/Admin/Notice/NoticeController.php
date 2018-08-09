<?php

namespace App\Http\Controllers\Admin\Notice;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Notice_photo;
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
        $data = Notice::where('id', $id)->get()[0];
        $photo_data=Notice_photo::where('notice_id',$data->id)->get();
        return view('admin.notice.edit', compact('data','photo_data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'notice_title' => 'required',
            'fileimage' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,zip|max:5120',
            'notice_content' => 'required',
        ]);

        $delete = Notice::where('notice_id', $id)->get()[0];
        if ($delete['fileimage'] != null) {
            File::delete($delete['fileimage']);
            File::delete($delete['notice_thumbnails']);
        }
        if ($request->hasFile('fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/notice')) {
                    File::makeDirectory('fileuploaded/notice');
                    if (@is_array(getimagesize($request['fileimage']))) {
                        if (!file_exists('fileuploaded/notice/thumbnails')) {
                            File::makeDirectory('fileuploaded/notice/thumbnails');
                        }
                    }
                    if (!file_exists('fileuploaded/notice/images')) {
                        File::makeDirectory('fileuploaded/notice/images');
                    }
                }
            }
            $image = $request->file('fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            if (@is_array(getimagesize($request['fileimage']))) {
                $destinationPath = public_path('fileuploaded/notice/thumbnails');
                $thumbnails = Image::make($image->getRealPath());
                $thumbnails->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imagename);
            }
            $destinationPath = public_path('fileuploaded/notice/images');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/notice/images/' . $imagename;
            $file_1 = 'fileuploaded/notice/thumbnails/' . $imagename;
        } else {
            $file = null;
            $file_1 = null;
        }
        $date = Carbon::now();

        $data = Notice::where('notice_id', $id)
            ->update([
                'notice_title' => $request['notice_title'],
                'notice_content' => $request['notice_content'],
                'fileimage' => $file,
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

    public function noticefileupload(UploadRequest $request)
    {
        $this->validate($request, [
            'notice_content' => 'required',
        ]);
        if ($request->file('fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/notice')) {
                    File::makeDirectory('fileuploaded/notice');
                    if (@is_array(getimagesize($request['fileimage']))) {
                        if (!file_exists('fileuploaded/notice/thumbnails')) {
                            File::makeDirectory('fileuploaded/notice/thumbnails');
                        }
                    }
                    if (!file_exists('fileuploaded/notice/images')) {
                        File::makeDirectory('fileuploaded/notice/images');
                    }
                }
            }
        }

        $date = Carbon::now();

        $notices = new Notice;

        $notices->notice_title = $request['notice_title'];
        $notices->notice_content = $request['notice_content'];
        $notices->notice_date = $date;
        $notices->save();

        $destinationPath = public_path('fileuploaded/notice/images');
        $order = 0;
        $file = $request->file('fileimage');
        foreach ($file as $fileimage) {
            $notice_photo = new Notice_photo;
            $filename = $notices->notice_title . '_' . $order . '.' . $fileimage->getClientOriginalExtension();
            $fileimage->move($destinationPath, $filename);
            $notice_photo->notice_id = $notices->id;
            $notice_photo->fileimage = $filename;
            ++$order;
            $notice_photo->save();
        }


        return back();


    }

}
