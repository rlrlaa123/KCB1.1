<?php

namespace App\Http\Controllers\UserView\Community;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Asking;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class UserAskingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = Asking::latest()->paginate(10);
        return view('Asking.index', compact('data'));
    }

    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);

        $data = Asking::where('id', $id)->first();
//        $previous1 = Asking::where('id', '<', $data->id)->get();
//        $next1 = Asking::where('id', '>', $data->id)->get();
//        $previous = $previous1->where(max('id'))->get();
//        $next = $next1->where(min('id'))->get();
        return view('.Asking.detail', compact('data'));
    }

    public function write()
    {
        return view('.Asking.asking');
    }


    public function asking_fileupload(Request $request)
    {
        $request->user()->authorizeRoles(['premium']);
        $this->validate($request, [
            'asking_user' => 'required|string',
            'asking_user_email' => 'required|string',
            'asking_title' => 'required',
            'asking_file' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,svg,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'asking_password' => 'nullable|string|min:4|max:4',
            'asking_content' => 'required',
        ]);
        if (!file_exists('userconsulting')) {
            File::makeDirectory('userconsulting');
            if (!file_exists('userconsulting/file'))
                File::makeDirectory('userconsulting/file');
            if (!file_exists('userconsulting/image'))
                File::makeDirectory('userconsulting/image');
        }
        $date = Carbon::now();
        $ask = new Asking;
        $ask->asking_title = $request['asking_title'];
        $ask->asking_user = $request['asking_user'];
        $ask->asking_user_email = $request['asking_user_email'];
        $ask->asking_content = $request['asking_content'];
        $ask->asking_password = Hash::make($request['asking_password']);
        $ask->asking_date = $date;

        if ($request->asking_file == null) {
            $ask->asking_file = null;
        } else {
            $file = $request->file('asking_file');
            $filename = $request['asking_title'] . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('userconsulting/file');
            $file->move($destinationPath, $filename);
            $ask->asking_file = 'userconsulting/file/' . $filename;
        }
        if ($request->image == null) {
            $ask->image = null;
        } else {
            $image = $request->file('image');
            $imagename = $request['asking_title'] . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('userconsulting/image');
            $image->move($destinationPath, $imagename);
            $ask->image = 'userconsulting/image/' . $imagename;
        }
        $ask->save();
        return redirect('asking')->with('success', '등록완료');
    }

    public function asking_filedownload(Request $request, $id)
    {
        $request->user()->authorizeRoles(['premium']);//premium을 파라미터로 던져서 프리미엄이 해당 사용자의 객체에 있는지 조회한 후 return.
        $data = Asking::where('id', $id)->first();
        $download_path = (public_path() . '/' . $data->asking_file);
        return response()->download($download_path);
    }
    public function asking_compare(Request $request){
        $request
    }

}

