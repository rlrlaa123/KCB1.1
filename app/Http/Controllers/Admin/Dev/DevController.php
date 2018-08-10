<?php

namespace App\Http\Controllers\Admin\Dev;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Location;
use App\SearchCharge;
use App\SearchType;
use App\Dev;
use App\Dev_Files;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use Image;

class DevController extends Controller
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
        $dev = Dev::latest()->paginate(30);
        return view('admin.dev.dev_info.index', compact('dev'));
    }

    public function create()
    {
        $locations = Location::all();
        $cities = Location::distinct()->get(['dev_city']);
        $searchtype = SearchType::all();
        $searchcharge = SearchCharge::all();

        return view('admin.dev.dev_info.create', compact('locations', 'searchtype', 'searchcharge', 'cities'));
    }

    public function developmentfileupload(UploadRequest $request)
    {
        $this->validate($request, [
            'dev_title' => 'required|string',
            'dev_initiated_log' => 'required',
            'dev_initiated_date' => 'required|date',
            'dev_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'dev_comment' => 'required',
            'dev_city' => 'required',
            'dev_district' => 'required',
            'dev_type' => 'required',
            'dev_charge' => 'required',
            'dev_status' => 'required',
            'dev_method' => 'required',
            'dev_area_size' => 'required|integer',
            'dev_applied_law' => 'nullable|string',
            'dev_publicly_starting_date' => 'required|string',
            'dev_future_plan' => 'nullable',
        ]);

        if (!file_exists('fileuploaded')) {
            File::makeDirectory('fileuploaded/');
            if (!file_exists('fileuploaded/Development_information')) {
                File::makeDirectory('fileuploaded/Development_information');
                if (!file_exists('fileuploaded/Development_information/images')) {
                    File::makeDirectory('fileuploaded/Development_information/images');
                }
                if (!file_exists('fileuploaded/Development_information/references')) {
                    File::makeDirectory('fileuploaded/Development_information/references');
                }
            }
        }
        $dev = new Dev;

        // Image 파일 업로드
        $image = $request->file('dev_fileimage');
        $imagename = 'dev_info' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath_image = public_path('fileuploaded/Development_information/images');
        $image->move($destinationPath_image, $imagename);

        $dev->dev_title = $request['dev_title'];
        $dev->dev_initiated_log = $request['dev_initiated_log'];
        $dev->dev_initiated_date = $request['dev_initiated_date'];
        $dev->dev_fileimage = 'fileuploaded/Development_information/images/' . $imagename;
        $dev->dev_comment = $request['dev_comment'];
        $dev->dev_city = $request['dev_city'];
        $dev->dev_district = $request['dev_district'];
        $dev->dev_type = $request['dev_type'];
        $dev->dev_charge = $request['dev_charge'];
        $dev->dev_status = $request['dev_status'];
        $dev->dev_method = $request['dev_method'];
        $dev->dev_area_size = $request['dev_area_size'];
        $dev->dev_applied_law = $request['dev_applied_law'];
        $dev->dev_publicly_starting_date = $request['dev_publicly_starting_date'];
        $dev->dev_future_plan = $request['dev_future_plan'];

        $dev->save();
        // Reference 파일 업로드
        if ($request->file('fileimage')) {
            $order = 0;
            $destinationPath_reference = public_path('fileuploaded/Development_information/references');
            $files = $request->file('fileimage');
            foreach ($files as $fileimage) {
                $dev_files = New Dev_Files;
                $dev_files->dev_id = $dev->id;
                $filename = 'dev_info' . $dev->id . '_' . $order . '.' . $fileimage->getClientOriginalExtension();
                $fileimage->move($destinationPath_reference, $filename);
                $dev_files->fileimage = 'fileuploaded/Development_information/references/' . $filename;
                ++$order;
                $dev_files->save();
            }
        }

        return redirect('admin/dev');
    }

    public function edit($id)
    {
        $data = Dev::where('id', $id)->get()[0];
        $locations = Location::all();
        $cities = Location::distinct()->get(['dev_city']);
        $searchtype = SearchType::all();
        $searchcharge = SearchCharge::all();

        return view('admin.dev.dev_info.edit', compact('data', 'locations', 'searchtype', 'searchcharge', 'cities'));
    }

    // 수정사항 -> dev_fileimage를 nullable로 바꿈, why? 유저가 단순 텍스트만 수정하고 싶을 때에도 이미지를 추가해야하는 것이 번거롭기 때문,
    // 수정사항으로 발생한 이슈 -> 데이터를 update 할 때, dev_fileimage, dev_reference, dev_thumbnails 데이터가 없어서 에러가 발생함,
    // 이슈 해결 -> 이미지를 업로딩 할 때, 따로 데이터를 update 해주도록 코드를 바꿈.
    public function update(UploadRequest $request, $id)
    {
        $this->validate($request, [
            'dev_title' => 'required|string',
            'dev_initiated_log' => 'required',
            'dev_initiated_date' => 'required|date',
            'dev_fileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'dev_comment' => 'required',
            'dev_city' => 'required',
            'dev_district' => 'required',
            'dev_type' => 'required',
            'dev_charge' => 'required',
            'dev_status' => 'required',
            'dev_method' => 'required',
            'dev_area_size' => 'required|integer',
            'dev_applied_law' => 'nullable|string',
            'dev_publicly_starting_date' => 'required|string',
            'dev_future_plan' => 'nullable',
        ]);

        $delete = Dev_Files::where('dev_id', $id)->get();
        foreach ($delete as $deleting) {
            if ($deleting['fileimage'] != null) {
                File::delete($deleting['fileimage']);
            }
        }
        if ($request->file('dev_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/Development_information')) {
                    File::makeDirectory('fileuploaded/Development_information');
                    if (!file_exists('fileuploaded/Development_information/images')) {
                        File::makeDirectory('fileuploaded/Development_information/images');
                    }
                }
            }
            $delete = Dev::where('id', $id)->get()[0];
            if ($delete['dev_fileimage'] != null) {
                File::delete($delete['dev_fileimage']);
            }
            $image = $request->file('dev_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/Development_information/images');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/Development_information/images/' . $imagename;
            $dev = Dev::where('id', $id)->update([
                'dev_fileimage' => $file,
            ]);
        } else {
            $file = null;
            $dev = Dev::where('id', $id)->update([
                'dev_fileimage' => $file,
            ]);
        }

        $dev = Dev::where('id', $id)
            ->update([
                'dev_title' => $request['dev_title'],
                'dev_initiated_log' => $request['dev_initiated_log'],
                'dev_initiated_date' => $request['dev_initiated_date'],
                'dev_comment' => $request['dev_comment'],
                'dev_city' => $request['dev_city'],
                'dev_district' => $request['dev_district'],
                'dev_type' => $request['dev_type'],
                'dev_charge' => $request['dev_charge'],
                'dev_status' => $request['dev_status'],
                'dev_method' => $request['dev_method'],
                'dev_area_size' => $request['dev_area_size'],
                'dev_applied_law' => $request['dev_applied_law'],
                'dev_publicly_starting_date' => $request['dev_publicly_starting_date'],
                'dev_future_plan' => $request['dev_future_plan'],
            ]);
        $data1 = Dev_Files::where('dev_id', $id)->delete();
        $data = Dev::where('id', $id)->get()[0];

        if ($request->file('fileimage')) {
            if (!file_exists('fileuploaded/Development_information/references')) {
                File::makeDirectory('fileuploaded/Development_information/references');
                if (!file_exists('fileuploaded/Development_information')) {
                    File::makeDirectory('fileuploaded/Development_information');
                }
            }

            $order = 0;
            $destinationPath_reference = public_path('fileuploaded/Development_information/references');
            $files = $request->file('fileimage');
            foreach ($files as $fileimage) {
                $dev_files = New Dev_Files;
                $dev_files-> dev_id = $data->id;
                $filename = 'dev_info' . $data->id . '_' . $order . '.' . $fileimage->getClientOriginalExtension();
                $fileimage->move($destinationPath_reference, $filename);
                $dev_files->fileimage = 'fileuploaded/Development_information/references/' . $filename;
                ++$order;
                $dev_files->save();
            }

        }

        return redirect('admin/dev');
    }

    public function delete($id)
    {
        $dev = Dev::where('id', $id)->delete();

        return response()->json([], 204);
    }
}
