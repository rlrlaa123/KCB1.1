<?php

namespace App\Http\Controllers\Admin\Dev;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Location;
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
        $locations = Location::all();
        return view('admin.dev.dev_info.index', compact('locations'));
    }

    public function developmentfileupload(Request $request)
    {
        $this->validate($request, [
            'dev_title' => 'required|string',
            'dev_initiated_log' => 'required',
            'dev_initiated_date' => 'required|date',
            'dev_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dev_comment' => 'required',
            'dev_city' => 'required|string',
            'dev_district' => 'required|string',
            'location' => 'nullable|string',
            'dev_type' => 'required|string',
            'dev_charge' => 'required|string',
            'dev_status' => 'required|string',
            'dev_method' => 'required|string',
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

        $image = $request->file('dev_fileimage');
        $reference = $request->file('dev_reference');
        $imagename = $request['dev_title'] . '.' . $image->getClientOriginalExtension();
        $reference_name = $request['dev_title'] . '.' . $reference->getClientOriginalExtension();

        $destinationPath = public_path('fileuploaded/Development_information/thumbnails');
        $thumbnails = Image::make($image->getRealPath());
        $thumbnails->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imagename);

        $destinationPath = public_path('fileuploaded/Development_information/images');
        $image->move($destinationPath, $imagename);

        $destinationPath = public_path('fileuploaded/Development_information/references');
        $reference->move($destinationPath, $reference_name);

        $dev = new Dev;
        $dev->dev_title = $request['dev_title'];
        $dev->dev_initiated_log = $request['dev_initiated_log'];
        $dev->dev_initiated_date = $request['dev_initiated_date'];
        $dev->dev_fileimage = 'fileuploaded/Development_information/images/' . $imagename;
        $dev->dev_thumbnails = 'fileuploaded/Development_information/thumbnails/' . $imagename;
        $dev->dev_reference = 'fileuploaded/Development_information/references/' . $reference_name;
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

//        $this->postImage->add($input);

        return back()
            ->with('success');
    }
}
