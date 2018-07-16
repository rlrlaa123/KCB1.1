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

    public function search(Request $request)
    {
        $search = \App\User::where('username', "{$request->search_user}")->get();
        if ($search != null) {
            $result = $search;
        } else {
            $result = [];
        }
        $data = \App\User::latest()->orderby('id')->paginate(30);
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

        /*----------------------------------------------------------------------------------------*/
        $_array['type'] = "sms";
        $_array['phone'] = $user->phone;
        $_array['names'] = iconv("UTF-8", "EUC-KR", $user->name);
        $_array['msg'] = iconv(
            "UTF-8",
            "EUC-KR",
            "[(주)한국보상원]\n" . $user->name . " 님의 회원 등급 변경이 완료됐습니다\n 변경사항은 마이페이지에서 확인하실 수 있습니다."
        );
        $_array['userid'] = "jazzpia";
        $_array['callback'] = "01063152563";
//        return json_encode($_array['names']);
        $postValues = '';

        $host = "sms.smsmania.co.kr";
        $target = "/module/socket_send_multi.php";
        $port = 80;

        $socket = fsockopen($host, $port);
        if (is_array($_array)) {
            foreach ($_array AS $name => $value)
                $postValues .= urlencode($name) . "=" . urlencode($value) . "&";
            $postValues = substr($postValues, 0, -1);
        }

        $postLength = strlen($postValues);
        $request = "POST $target HTTP/1.0\r\n";
        $request .= "Host: $host\r\n";
        $request .= "User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)\r\n";
        $request .= "Content-type: application/x-www-form-urlencoded\r\n";
        $request .= "Content-length: " . $postLength . "\r\n\r\n";
        $request .= $postValues . "\r\n";
        fputs($socket, $request);
        $ret = "";
        while (!feof($socket)) {
            $ret .= trim(fgets($socket, 4096));
        }

        fclose($socket);
        $std_bar = ":header_stop:";

        return redirect('admin/user/');
    }

}
