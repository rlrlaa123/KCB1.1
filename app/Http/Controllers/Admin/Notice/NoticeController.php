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
use Illuminate\Support\Facades\Storage;
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

    public function update(UploadRequest $request, $id)
    {
        $this->validate($request, [
            'notice_title' => 'required',
        ]);

        $delete = Notice_photo::where('notice_id', $id)->get();
        foreach($delete as $deleting){
            if ($deleting['fileimage'] != null) {
                File::delete($deleting['fileimage']);
            }
        }

        if ($request->file('fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/notice')) {
                    File::makeDirectory('fileuploaded/notice');
//                    if (@is_array(getimagesize($request['fileimage']))) {
//
//                    }
                    if (!file_exists('fileuploaded/notice/images')) {
                        File::makeDirectory('fileuploaded/notice/images');
                    }
                }
            }
        }
            $date = Carbon::now();

//            if (@is_array(getimagesize($request['fileimage']))) {
//                $destinationPath = public_path('fileuploaded/notice/thumbnails');
//                $thumbnails = Image::make($image->getRealPath());
//                $thumbnails->resize(100, 100, function ($constraint) {
//                    $constraint->aspectRatio();
//                })->save($destinationPath . '/' . $imagename);
//            }
            $destinationPath = public_path('fileuploaded/notice/images');


//            $file = 'fileuploaded/notice/images/' . $imagename;
//        } else {
//            $file = null;
//        }
        $date = Carbon::now();

        $data = Notice::where('id', $id)
            ->update([
                'notice_title' => $request['notice_title'],
                'notice_content' => $request['notice_content'],
                'notice_date' => $date
            ]);
//        $file=$request->file('fileimage');
//        $x=0;
        $data1 = Notice_photo::where('notice_id', $id)->delete();
        $data=Notice::where('id', $id)->get()[0];

        $destinationPath = public_path('fileuploaded/notice/images');
        $order = 0;
        $file = $request->file('fileimage');
        foreach ($file as $fileimage) {
            $notice_photo = new Notice_photo;
            $filename = 'notice' . $data->id . '_' . $order . '.' . $fileimage->getClientOriginalExtension();
            $fileimage->move($destinationPath, $filename);
            $notice_photo->notice_id = $data->id;
            $notice_photo->fileimage = 'fileuploaded/notice/images/' . $filename;
            ++$order;
            $notice_photo->save();
        }
//        foreach($file as $fileimage) {
//            $filename = 'notice' . $data->id . '_' . $x . '.' . $fileimage->getClientOriginalExtension();
//
//            $fileimage->move($destinationPath, $filename);
//            $data1[$x]->update([
//                'notice_fileimage' => 'fileuploaded/notice/images/' . $filename,
//                ]);
//            $x++;
//        }


        return redirect('admin/notice');
    }

    public function delete($id)
    {
        $data = Notice::where('id', $id)->delete();
        $delete = Notice_photo::where('notice_id', $id)->get();
        foreach($delete as $deleting){
            if ($deleting['fileimage'] != null) {
                unlink($deleting['fileimage']);
            }
        }
        $data1= Notice_photo::where('notice_id', $id)->delete();

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
//                    if (@is_array(getimagesize($request['fileimage']))) {
//
//                    }
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
            $filename = 'notice' . $notices->id . '_' . $order . '.' . $fileimage->getClientOriginalExtension();
            $fileimage->move($destinationPath, $filename);
            $notice_photo->notice_id = $notices->id;
            $notice_photo->fileimage = 'fileuploaded/notice/images/' . $filename;
            ++$order;
            $notice_photo->save();
        }


        return back();


    }

}
