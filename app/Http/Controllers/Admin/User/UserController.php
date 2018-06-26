<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $data = User::latest()->orderby('id')->paginate(30);
        $result = [];
        return view('admin.user.user_info.index', compact('data', 'result'));
    }
    public function user_grade_control(Request $request)
    {
        $role_premium = \App\Role::where('name', 'premium')->first();
        $role_user = \App\Role::where('name', 'user')->first();
        $user = \App\User::where('id', $request->id)->first();
        $grade_updated_at = \Carbon\Carbon::now();
        $updated_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $grade_updated_at);
        if ($request->grade == '6premium') {
            $user->roles()->detach();
            $user->roles()->attach($role_premium);
            $user->grade = '6premium';
            $user->grade_updated_at = $updated_time;
            $user->grade_expiration_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $grade_updated_at)->addDays('180');
        } else if ($request->grade == '12premium') {
            $user->roles()->detach();
            $user->roles()->attach($role_premium);
            $user->grade = '12premium';
            $user->grade_updated_at = $updated_time;
            $user->grade_expiration_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $grade_updated_at)->addDays('365');
        } else {
            $user->roles()->detach();
            $user->roles()->attach($role_user);
            $user->grade = 'user';
            $user->grade_updated_at = null;
            $user->grade_expiration_date = null;
        }
        $user->save();

        // sms 발송
        event('grade_control', $user);

        return redirect('admin/user/');
    }

}
