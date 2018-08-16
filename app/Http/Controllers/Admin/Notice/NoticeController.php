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
use App\Location;
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
        $cities = Location::distinct()->get(['dev_city']);
        $data = Notice::all();
        return view('admin.notice.create', compact('data','cities'));
    }

    public function noticefileupload(UploadRequest $request)
    {
        $this->validate($request, [
            'notice_content' => 'required',
            'classification' => 'required',
            'location' => 'required',
        ]);
        if ($request->file('fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/notice')) {
                    File::makeDirectory('fileuploaded/notice');
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
        $notices->classification = $request['classification'];
        $notices->location = $request['location'];
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

    public function edit($id)
    {
        $cities = Location::distinct()->get(['dev_city']);
        $data = Notice::where('id', $id)->get()[0];
        return view('admin.notice.edit', compact('data','cities'));
    }

    public function update(UploadRequest $request, $id)
    {
        $this->validate($request, [
            'notice_title' => 'required',
        ]);

        $delete = Notice_photo::where('notice_id', $id)->get();
        foreach ($delete as $deleting) {
            if ($deleting['fileimage'] != null) {
                File::delete($deleting['fileimage']);
            }
        }

        if ($request->file('fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/notice')) {
                    File::makeDirectory('fileuploaded/notice');
                    if (!file_exists('fileuploaded/notice/images')) {
                        File::makeDirectory('fileuploaded/notice/images');
                    }
                }
            }
        }
        $destinationPath = public_path('fileuploaded/notice/images');

        $date = Carbon::now();

        $data = Notice::where('id', $id)
            ->update([
                'location' => $request['location'],
                'notice_title' => $request['notice_title'],
                'notice_content' => $request['notice_content'],
                'classification' => $request['classification'],
                'notice_date' => $date
            ]);
        $data1 = Notice_photo::where('notice_id', $id)->delete();
        $data = Notice::where('id', $id)->get()[0];

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
        return redirect('admin/notice');
    }

    public function delete($id)
    {
        $delete = Notice_photo::where('notice_id', $id)->get();
        foreach ($delete as $deleting) {
            if ($deleting['fileimage'] != null) {
                unlink($deleting['fileimage']);
            }
        }
        $data = Notice::where('id', $id)->delete();
        $data1 = Notice_photo::where('notice_id', $id)->delete();

        return response()->json([], 204);
    }


}
