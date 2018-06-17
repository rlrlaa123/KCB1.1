<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::get('/myinfo', 'UserView\MyInfoController@index');
Route::get('/intro', 'IntroController@index');

Route::get('/agreement', 'Auth\AgreementController@index');

/*------------------보상용역대행컨설팅------------------------------------*/

Route::get('/consulting', 'ConsultingViewController@Index');
Route::get('/consulting_filedownload/{id}', 'ConsultingViewController@consulting_filedownload');

Route::resource('/articles', 'ArticlesController');

Route::get('/fee', 'FeeController@index');
//Route::post('/action_page', function(){
//    return view('layouts.navbar.action_page');
//});
Route::get('/search', 'SearchController@search');
//개발정보검색
Route::get('dev_info', 'UserView\Dev\DevViewController@index');
Route::get('dev_info/{id}', 'UserView\Dev\DevViewController@show');
Route::get('development_filedownload/{id}', 'UserView\Dev\DevViewController@development_filedownload');
Route::get('development_reference_filedownload/{id}', 'UserView\Dev\DevViewController@development_reference_filedownload');
Route::post('showdistrictlist', function (\Illuminate\Http\Request $request) {
    $location = \App\Location::select('num_id')->where('dev_city', $request->data)->get();

    return $location;
});
Route::post('chosen', function (\Illuminate\Http\Request $request) {
//    return $request;
    // dev_district
    if ($request->dev_district != null && $request->dev_type == null && $request->dev_charge == null) {
        if ($request->dev_district == '전체')
            $data = \App\Dev::where('dev_city', $request->dev_city)->orderBy('dev_district')->get();
        else
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_district' => $request->dev_district])->orderBy('dev_district')->get();
    } // dev_type
    elseif ($request->dev_type != null && $request->dev_district == null && $request->dev_charge == null) {
        if ($request->dev_type == '전체') {
            $data = \App\Dev::orderBy('dev_type')->get();
        } else
            $data = \App\Dev::where('dev_type', $request->dev_type)->orderBy('dev_type')->get();
    } // dev_charge
    elseif ($request->dev_charge != null && $request->dev_district == null && $request->dev_type == null) {
        if ($request->dev_charge == '전체')
            $data = \App\Dev::orderBy('dev_charge')->get();
        else
            $data = \App\Dev::where('dev_charge', $request->dev_charge)->orderBy('dev_charge')->get();
    } // dev_district dev_type
    elseif ($request->dev_district != null && $request->dev_type != null && $request->dev_charge == null) {
        if ($request->dev_district == '전체' && $request->dev_type == '전체')
            $data = \App\Dev::where('dev_city', $request->dev_city)->orderBy('dev_district')->get();
        elseif ($request->dev_district == '전체' && $request->dev_type != '전체')
            $data = \App\Dev::where(['dev_type' => $request->dev_type, 'dev_city' => $request->dev_city])->orderBy('dev_type')->get();
        elseif ($request->dev_district != '전체' && $request->dev_type == '전체')
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_district' => $request->dev_district])->orderBy('dev_district')->get();
        else
            $data = \App\Dev::where(['dev_district' => $request->dev_district, 'dev_type' => $request->dev_type])->get();
    } // dev_district dev_charge
    elseif ($request->dev_district != null && $request->dev_type == null && $request->dev_charge != null) {
        if ($request->dev_charge == '전체' && $request->dev_district == '전체')
            $data = \App\Dev::where('dev_city', $request->dev_city)->orderBy('dev_charge')->get();
        elseif ($request->dev_charge == '전체' && $request->dev_district != '전체')
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_district' => $request->dev_district])->orderBy('dev_district')->get();
        elseif ($request->dev_charge != '전체' && $request->dev_district == '전체')
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_charge' => $request->dev_charge])->orderBy('dev_charge')->get();
        else
            $data = \App\Dev::where(['dev_district' => $request->dev_district, 'dev_charge' => $request->dev_charge])->get();
    } // dev_type dev_charge
    elseif ($request->dev_district == null && $request->dev_type != null && $request->dev_charge != null) {
        if ($request->dev_type == '전체' && $request->dev_charge == '전체')
            $data = \App\Dev::orderBy('dev_type')->get();
        elseif ($request->dev_type == '전체' && $request->dev_charge != '전체')
            $data = \App\Dev::where('dev_charge', $request->dev_charge)->orderBy('dev_charge')->get();
        elseif ($request->dev_type != '전체' && $request->dev_charge == '전체')
            $data = \App\Dev::where('dev_type', $request->dev_type)->orderBy('dev_type')->get();
        else
            $data = \App\Dev::where(['dev_type' => $request->dev_type, 'dev_charge' => $request->dev_charge])->get();
    } // dev_district dev_type dev_charge
    elseif ($request->dev_district != null && $request->dev_type != null && $request->dev_charge != null) {
        if ($request->dev_type == '전체' && $request->dev_charge == '전체' && $request->dev_district == '전체')
            $data = \App\Dev::where('dev_city', $request->dev_city)->orderBy('dev_district')->get();
        elseif ($request->dev_type == '전체' && $request->dev_charge == '전체' && $request->dev_district != '전체')
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_district' => $request->dev_district])->get();
        elseif ($request->dev_type != '전체' && $request->dev_charge == '전체' && $request->dev_district == '전체')
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_type' => $request->dev_type])->get();
        elseif ($request->dev_type == '전체' && $request->dev_charge != '전체' && $request->dev_district == '전체')
            $data = \App\Dev::where(['dev_city' => $request->dev_city, 'dev_charge' => $request->dev_charge])->get();
        else
            $data = \App\Dev::where([
                'dev_district' => $request->dev_district,
                'dev_type' => $request->dev_type,
                'dev_charge' => $request->dev_charge
            ])->get();
    }

    return json_encode($data, JSON_UNESCAPED_UNICODE);
});
//---------------------------------------------------------------------------------------------------------
//공지사항
Route::get('fyi', 'UserView\FYI\FYIViewController@index');
Route::get('fyi/{id}', 'UserView\FYI\FYIViewController@show');
Route::get('fyi_filedownload/{id}', 'UserView\FYI\FYIViewController@fyi_filedownload');
Route::get('fyisearch', 'SearchController@fyi_search');

//---------------------------------------------------------------------------------------------------------
//유권해석/판례
Route::get('/judicial', 'UserView\Judicial\JudicialViewController@index');
Route::get('/judicial/{id}', 'UserView\Judicial\JudicialViewController@show');
Route::get('/j_filedownload/{id}', 'UserView\Judicial\JudicialViewController@j_filedownload');
Route::get('/judicialsearch', 'SearchController@j_search');

Route::get('/hotfocus', 'UserView\Judicial\HotFocusViewController@index');
Route::get('/hotfocus/{id}', 'UserView\Judicial\HotFocusViewController@show');
Route::get('/hf_filedownload/{id}', 'UserView\Judicial\HotFocusViewController@hf_filedownload');
Route::get('/hotfocussearch', 'SearchController@hf_search');

Route::get('/relatednews', 'UserView\Judicial\RelatedNewsUserViewController@index');
Route::get('/relatednews/{id}', 'UserView\Judicial\RelatedNewsUserViewController@show');
Route::get('/rn_filedownload/{id}', 'UserView\Judicial\RelatedNewsUserViewController@rn_filedownload');
Route::get('/relatednewssearch', 'SearchController@relatednews_search');

Route::get('/policy', 'UserView\Judicial\PoliciesViewController@index');
Route::get('/policy/{id}', 'UserView\Judicial\PoliciesViewController@show');
Route::get('/p_filedownload/{id}', 'UserView\Judicial\PoliciesViewController@p_filedownload');
Route::get('/policysearch', 'SearchController@p_search');
//---------------------------------------------------------------------------------------------------------
//자료실
Route::get('/library', 'UserView\Library\LibraryViewController@index');
Route::get('/library/{id}', 'UserView\Library\LibraryViewController@show');
Route::get('/library_filedownload/{id}', 'UserView\Library\LibraryViewController@library_filedownload');
Route::get('/librarysearch/', 'SearchController@library_search');
//---------------------------------------------------------------------------------------------------------
//공고 공시
Route::get('/notice', 'UserView\Notice\NoticeViewController@index');
Route::get('/notice/{id}', 'UserView\Notice\NoticeViewController@show');
Route::get('/notice_filedownload/{id}', 'UserView\Notice\NoticeViewController@notice_filedownload');
Route::get('/noticesearch', 'SearchController@notice_search');
//---------------------------------------------------------------------------------------------------------
//커뮤니티
Route::get('/asking', 'UserView\Community\UserAskingController@index');
Route::get('/asking/{id}', 'UserView\Community\UserAskingController@show');
Route::post('/asking/compare','UserView\Community\UserAskingController@asking_compare');
Route::get('/asking/compare/{id}','UserView\Community\UserAskingController@asking_compare');
Route::get('/ask','UserView\Community\UserAskingController@write');
Route::post('/asking_fileupload', 'UserView\Community\UserAskingController@asking_fileupload');
Route::get('/asking_filedownload/{id}', 'UserView\Community\UserAskingController@asking_filedownload');

Route::get('/report', 'UserView\Community\UserReportController@index');
Route::post('/report_fileupload', 'UserView\Community\UserReportController@report_fileupload');
//---------------------------------------------------------------------------------------------------------
//관리자
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/dev');
    });

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/basic/', 'Admin\Basic\SiteController@index');

    //------------------회원정보 리스트----------------------//
    Route::get('/user/', 'Admin\User\UserController@index');
    Route::post('search_user', function (\Illuminate\Http\Request $request) {
        $search = \App\User::where('username', $request->search_user)->get();
        if ($search != null) {
            $result = $search;
        } else {
            $result = [];
        }
        $data = \App\User::latest()->orderby('id')->paginate(30);

        return view('admin.user.user_info.index', compact('data', 'result'));
    });
    Route::post('/user_grade_control', function (\Illuminate\Http\Request $request) {
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
        return redirect('admin/user/');
    });
    //----------------보상용역대행 컨설팅--------------------//
    Route::get('/consulting/', 'Admin\Consulting\ConsultingController@index');
    Route::post('/consultingfileupload/', 'Admin\Consulting\ConsultingController@consultingfileupload');

    //----------------공지사항--------------------//
    Route::get('/fyi/', 'Admin\FYI\FYIController@index');
    Route::get('/fyi/create', 'Admin\FYI\FYIController@create');
    Route::get('/fyi/{id}/edit', 'Admin\FYI\FYIController@edit');
    Route::put('/fyi/{id}/update', 'Admin\FYI\FYIController@update')->name('admin.fyi.update');
    Route::delete('/fyi/{id}', 'Admin\FYI\FYIController@delete')->name('admin.fyi.delete');
    Route::post('/fyifileupload/', 'Admin\FYI\FYIController@fyifileupload')->name('admin.fyi.store');

    //----------------자료실--------------------//
    Route::get('/library/', 'Admin\Library\LibraryController@index');
    Route::get('/library/create', 'Admin\Library\LibraryController@create');
    Route::get('/library/{id}/edit', 'Admin\Library\LibraryController@edit');
    Route::put('/library/{id}/update', 'Admin\Library\LibraryController@update')->name('admin.library.update');
    Route::delete('/library/{id}', 'Admin\Library\LibraryController@delete')->name('admin.library.delete');
    Route::post('/libraryfileupload/', 'Admin\Library\LibraryController@libraryfileupload')->name('admin.library.store');

    //-------------개발정보검색-----------------//
    Route::get('/dev/', 'Admin\Dev\DevController@index');
    Route::get('/dev/create', 'Admin\Dev\DevController@create');
    Route::get('/dev/{id}/edit', 'Admin\Dev\DevController@edit');
    Route::put('/dev/{id}/update', 'Admin\Dev\DevController@update')->name('admin.dev.update');
    Route::delete('/dev/{id}', 'Admin\Dev\DevController@delete')->name('admin.dev.delete');
    Route::post('/developmentfileupload/', 'Admin\Dev\DevController@developmentfileupload')->name('admin.dev.store');
    Route::post('/showdistrictlist', function (\Illuminate\Http\Request $request) {
        $locations = \App\Location::select('num_id', 'dev_district')->where('dev_city', $request->data)->get();

        return $locations;
    });

    //---------------공고/공시-----------------//
    Route::get('/notice/', 'Admin\Notice\NoticeController@index');
    Route::get('/notice/create', 'Admin\Notice\NoticeController@create');
    Route::get('/notice/{id}/edit', 'Admin\Notice\NoticeController@edit');
    Route::put('/notice/{id}/update', 'Admin\Notice\NoticeController@update')->name('admin.notice.update');
    Route::delete('/notice/{id}', 'Admin\Notice\NoticeController@delete')->name('admin.notice.delete');
    Route::post('/noticefileupload/', 'Admin\Notice\NoticeController@noticefileupload')->name('admin.notice.store');;
    //--------------유권해석판례----------------//
    Route::get('/judicial/', 'Admin\Judicial\JudicialController@index');
    Route::get('/judicial/create', 'Admin\Judicial\JudicialController@create');
    Route::get('/judicial/{id}/edit', 'Admin\Judicial\JudicialController@edit');
    Route::put('/judicial/{id}/update', 'Admin\Judicial\JudicialController@update')->name('admin.judicial.update');
    Route::delete('/judicial/{id}', 'Admin\Judicial\JudicialController@delete')->name('admin.judicial.delete');
    Route::post('/judicialfileupload/', 'Admin\Judicial\JudicialController@judicialfileupload')->name('admin.judicial.store');

    Route::get('/hotfocus/', 'Admin\Judicial\HotFocusController@index');
    Route::get('/hotfocus/create', 'Admin\Judicial\HotFocusController@create');
    Route::get('/hotfocus/{id}/edit', 'Admin\Judicial\HotFocusController@edit');
    Route::put('/hotfocus/{id}/update', 'Admin\Judicial\HotFocusController@update')->name('admin.hotfocus.update');
    Route::delete('/hotfocus/{id}', 'Admin\Judicial\HotFocusController@delete')->name('admin.hotfocus.delete');
    Route::post('/hotfocusfileupload/', 'Admin\Judicial\HotFocusController@hotfocusfileupload')->name('admin.hotfocus.store');

    Route::get('/relatednews/', 'Admin\Judicial\RelatedNewsController@index');
    Route::get('/relatednews/create', 'Admin\Judicial\RelatedNewsController@create');
    Route::get('/relatednews/{id}/edit', 'Admin\Judicial\RelatedNewsController@edit');
    Route::put('/relatednews/{id}/update', 'Admin\Judicial\RelatedNewsController@update')->name('admin.relatednews.update');
    Route::delete('/relatednews/{id}', 'Admin\Judicial\RelatedNewsController@delete')->name('admin.relatednews.delete');
    Route::post('/relatednewsfileupload/', 'Admin\Judicial\RelatedNewsController@relatednewsfileupload')->name('admin.relatednews.store');

    Route::get('/policy/', 'Admin\Judicial\PolicyController@index');
    Route::get('/policy/create', 'Admin\Judicial\PolicyController@create');
    Route::get('/policy/{id}/edit', 'Admin\Judicial\PolicyController@edit');
    Route::put('/policy/{id}/update', 'Admin\Judicial\PolicyController@update')->name('admin.policy.update');
    Route::delete('/policy/{id}', 'Admin\Judicial\PolicyController@delete')->name('admin.policy.delete');
    Route::post('/policyfileupload/', 'Admin\Judicial\PolicyController@policyfileupload')->name('admin.policy.store');

    //--------------커뮤니티----------------//
    Route::get('/report/', 'Admin\Community\ReportController@index');
    Route::get('/report/{id}', 'Admin\Community\ReportController@show');

    Route::get('/community/', 'Admin\Community\CommunityController@index');
    Route::get('/community/{id}', 'Admin\Community\CommunityController@show');
    Route::delete('/community/{id}', 'Admin\Community\CommunityController@destroy');

    Route::get('/asking/', 'Admin\Community\AskingController@index');
    Route::get('/asking/{id}', 'Admin\Community\AskingController@show');
    Route::get('/asking_filedownload/{id}', 'Admin\Community\AskingController@asking_filedownload');
    Route::post('/asking/comment', 'Admin\Community\AskingController@asking_comment');
});
//---------------------------------------------------------------------------------------------------------