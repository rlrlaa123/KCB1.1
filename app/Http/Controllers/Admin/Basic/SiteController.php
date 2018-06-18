<?php

namespace App\Http\Controllers\Admin\Basic;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Controllers\Controller;

class SiteController extends Controller
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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
//        return json_encode($request->user()->hasrole('admin'));
        $data = Admin::all();
        return view('admin.basic.site_info.index', compact('data'));
    }

    public function resetPassword($id)
    {
        $data = Admin::where('id', $id)->get()[0];
        return view('admin.basic.site_info.resetPassword', compact('data'));
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed'
        ]);

        $reset = Admin::where('id', $request['id'])->get()[0];
        $reset->password = bcrypt($request['password']);
        $reset->save();
        return redirect('/admin/basic');
    }
}
