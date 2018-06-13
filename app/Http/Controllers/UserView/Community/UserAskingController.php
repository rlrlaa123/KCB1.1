<?php

namespace App\Http\Controllers\UserView\Community;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Asking;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class UserAskingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        $data=Asking::latest()->paginate(10);
        return view('Asking.index', compact('data'));
    }
    public function show(Request $request, $id){
        $request->user()->authorizeRoles(['premium']);
        $data = Asking::where('id', $id)->first();
        $previous = Asking::where('id', '<', $data->id)->max('id');
        $next = Asking::where('id', '>', $data->id)->min('id');
        return view('.Asking.detail', compact('data', 'previous', 'next'));
    }
    public function write(){
        return view('.Asking.asking');
    }


    public function asking_fileupload(Request $request)
    {
        $request->user()->authorizeRoles(['premium']);
        $this->validate($request, [
            'asking_user'=>'required|string',
            'asking_user_email' => 'required|string',
            'asking_title' => 'required',
            'asking_file' => 'nullable|max:10000|mimes:gif,jpeg,jpg,png,svg,txt,xlsx,xls,ppt,pptx,doc,docx,pdf', //a required, max 10000kb, doc or docx, pdf file
            'asking_password' => 'required|string|min:4|max:4',
            'asking_content' => 'required',
        ]);
        if ($request->asking_file == null) {
            $date = Carbon::now();
            $ask = new Asking;
            $ask->asking_user = $request['asking_user'];
            $ask->asking_user_email = $request['asking_user_email'];
            $ask->asking_title = $request['asking_title'];
            $ask->asking_content = $request['asking_content'];
            $ask->asking_password = $request['asking_passowrd'];
            $ask->asking_file = null;
            $ask->asking_date = $date;

            $ask->save();

        } else {
            if (!file_exists('userconsulting')) {
                File::makeDirectory('userconsulting');
                if (!file_exists('userconsulting/file'))
                    File::makeDirectory('userconsulting/file');
            }
            $file = $request->file('asking_file');
            $filename = $request['asking_title'] . '.' . $file->getClientOriginalExtension();

            $date = Carbon::now();
            $destinationPath = public_path('userconsulting/file');
            $file->move($destinationPath, $filename);

            $ask = new Asking;
            $ask->asking_title = $request['asking_title'];
            $ask->asking_user = $request['asking_user'];
            $ask->asking_user_email = $request['asking_user_email'];
            $ask->asking_content = $request['asking_content'];
            $ask->asking_password = bcrypt($request['asking_passowrd']);
            $ask->asking_file = 'userconsulting/file/' . $filename;
            $ask->asking_date = $date;

            $ask->save();

        }
        return redirect('asking')->with('success','등록완료');
    }

}

