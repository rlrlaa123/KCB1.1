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

    public function index()
    {
        $data = HotFocus::all();
        return view('admin.judicial.hotfocus_info.index', compact('data'));
    }

    public function create()
    {
        $data = HotFocus::all();
        return view('admin.judicial.hotfocus_info.create', compact('data'));
    }

    public function edit($id)
    {
        $data = HotFocus::where('hf_id', $id)->get()[0];
        return view('admin.judicial.hotfocus_info.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hf_title' => 'required',
            'hf_fileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hf_content' => 'required',
            'dash_id' => 'integer'
        ]);
        if ($request->hasFile('hf_fileimage')) {
            if (!file_exists('fileuploaded')) {
                File::makeDirectory('fileuploaded');
                if (!file_exists('fileuploaded/hotfocus')) {
                    File::makeDirectory('fileuploaded/hotfocus');
                    if (!file_exists('fileuploaded/hotfocus/images')) {
                        File::makeDirectory('fileuploaded/hotfocus/images');
                    }
                    if (!file_exists('fileuploaded/hotfocus/thumbnails')) {
                        File::makeDirectory('fileuploaded/hotfocus/thumbnails');
                    }
                }
            }
            $delete= HotFocus::where('hf_id', $id)->get()[0];
            if($delete['hf_fileimage'] !=null) {
                File::delete($delete['hf_fileimage']);
                File::delete($delete['hf_thumbnails']);
            }

            $image = $request->file('hf_fileimage');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('fileuploaded/hotfocus/thumbnails');
            $thumbnails = Image::make($image->getRealPath());
            $thumbnails->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imagename);

            $destinationPath = public_path('fileuploaded/hotfocus/images');
            $image->move($destinationPath, $imagename);

            $file = 'fileuploaded/hotfocus/images/' . $imagename;
            $file_1 = 'fileuploaded/hotfocus/thumbnails/'.$imagename;
        } else {
            $file = null;
            $file_1=null;
        }
        $date = Carbon::now();

        $data = HotFocus::where('hf_id', $id)
            ->update([
                'hf_title' => $request['hf_title'],
                'hf_content' => $request['hf_content'],
                'dash_id' => 2,
                'hf_fileimage' => $file,
                'hf_thumbnails' => $file_1,
                'hf_date' => $date
            ]);


        return redirect('admin/hotfocus');
    }
    public function delete($id)
    {
        $data = HotFocus::where('hf_id', $id)->delete();

        return response()->json([], 204);
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
            if (!file_exists('fileuploaded/hotfocus')) {
                File::makeDirectory('fileuploaded/hotfocus');
                if (!file_exists('fileuploaded/hotfocus/images')) {
                    File::makeDirectory('fileuploaded/hotfocus/images');
                }
            }
        }

        $image = $request->file('hf_fileimage');
        $imagename = time() . '.' . $image->getClientOriginalExtension();

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
