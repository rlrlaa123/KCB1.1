<?php

namespace App\Http\Controllers\Admin\Dev;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Location;
use App\SearchCharge;
use App\SearchType;
use App\Dev;
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
        $dev = Dev::all();
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

    public function developmentfileupload(Request $request)
    {
//        return $request;
        $this->validate($request, [
            'dev_title' => 'required|string',
            'dev_initiated_log' => 'required',
            'dev_initiated_date' => 'required|date',
            'dev_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'dev_reference' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,svg,txt,xlsx,xls,ppt,pptx,doc,docx,pdf',
        ]);

        if (!file_exists('fileuploaded')) {
            File::makeDirectory('fileuploaded/');
            if (!file_exists('fileuploaded/Development_information')) {
                File::makeDirectory('fileuploaded/Development_information');
                if (!file_exists('fileuploaded/Development_information/images')) {
                    File::makeDirectory('fileuploaded/Development_information/images');
                }
                if (!file_exists('fileuploaded/Development_information/thumbnails')) {
                    File::makeDirectory('fileuploaded/Development_information/thumbnails');
                }
                if (!file_exists('fileuploaded/Development_information/references')) {
                    File::makeDirectory('fileuploaded/Development_information/references');
                }
            }
        }
        $dev = new Dev;

        // Image 파일 업로드
        $image = $request->file('dev_fileimage');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        // Reference 파일 업로드
        if ($request->hasFile('dev_reference')) {
            $reference = $request->file('dev_reference');
            $reference_name = time() . '.' . $reference->getClientOriginalExtension();

            $destinationPath_reference = public_path('fileuploaded/Development_information/references');
            $reference->move($destinationPath_reference, $reference_name);

            $dev->dev_reference = 'fileuploaded/Development_information/references/' . $reference_name;
        }

        $destinationPath_thumb = public_path('fileuploaded/Development_information/thumbnails');
        $thumbnails = Image::make($image->getRealPath());
        $thumbnails->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath_thumb . '/' . $imagename);

        $destinationPath_image = public_path('fileuploaded/Development_information/images');
        $image->move($destinationPath_image, $imagename);


        $dev->dev_title = $request['dev_title'];
        $dev->dev_initiated_log = $request['dev_initiated_log'];
        $dev->dev_initiated_date = $request['dev_initiated_date'];
        $dev->dev_fileimage = 'fileuploaded/Development_information/images/' . $imagename;
        $dev->dev_thumbnails = 'fileuploaded/Development_information/thumbnails/' . $imagename;
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

        return redirect('admin/dev');
    }

    public function edit($id)
    {
        $data = Dev::where('dev_id', $id)->get()[0];
        $locations = Location::all();
        $cities = Location::distinct()->get(['dev_city']);
        $searchtype = SearchType::all();
        $searchcharge = SearchCharge::all();

        return view('admin.dev.dev_info.edit', compact('data', 'locations', 'searchtype', 'searchcharge', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dev_title' => 'required|string',
            'dev_initiated_log' => 'required',
            'dev_initiated_date' => 'required|date',
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

        $dev = Dev::where('dev_id', $id)
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

        return redirect('admin/dev');
    }
}
