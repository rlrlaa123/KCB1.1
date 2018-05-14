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
Route::get('/intro', 'IntroController@index');
Route::get('/asking', function () {
    return view('asking');
});
Route::get('/agreement', 'Auth\AgreementController@index');
Route::resource('/articles', 'ArticlesController');
Route::get('/uploadfile', 'UploadFileController@index');
Route::post('/uploadfile', 'UploadFileController@showUploadFile');
//Route::post('/action_page', function(){
//    return view('layouts.navbar.action_page');
//});
Route::post('queries', 'QueryController@search')->name('queries.search');
//개발정보검색
Route::get('dev_info', 'UserView\Dev\DevViewController@index');
Route::get('dev/{id}', 'UserView\Dev\DevViewController@show');
Route::get('development_filedownload/{id}', 'UserView\Dev\DevViewController@development_filedownload');
Route::get('development_reference_filedownload/{id}', 'UserView\Dev\DevViewController@development_reference_filedownload');
Route::post('showdistrictlist', function(\Illuminate\Http\Request $request) {
    $location = \App\Location::select('num_id')->where('dev_city', $request->data)->get();

    return $location;
});
Route::post('chosen', function(\Illuminate\Http\Request $request) {
//    return $request;
    // dev_district
    if($request->dev_district != null && $request->dev_type == null && $request->dev_charge == null) {
        $data = \App\Dev::where('dev_district',$request->dev_district)->get();
    }
    // dev_type
    elseif ($request->dev_type != null && $request->dev_district == null && $request->dev_charge == null) {
        $data = \App\Dev::where('dev_type',$request->dev_type)->get();
    }
    // dev_charge
    elseif ($request->dev_charge != null && $request->dev_district == null && $request->dev_type == null) {
        $data = \App\Dev::where('dev_charge',$request->dev_charge)->get();
    }
    // dev_district dev_type
    elseif($request->dev_district != null && $request->dev_type != null && $request->dev_charge == null) {
        $data = \App\Dev::where('dev_district',$request->dev_district)->orWhere('dev_type',$request->dev_type)->get();
    }
    // dev_district dev_charge
    elseif($request->dev_district != null && $request->dev_type == null && $request->dev_charge != null) {
        $data = \App\Dev::where('dev_district',$request->dev_district)->orWhere('dev_charge',$request->dev_charge)->get();
    }
    // dev_type dev_charge
    elseif ($request->dev_district == null && $request->dev_type != null && $request->dev_charge != null) {
        $data = \App\Dev::where('dev_type',$request->dev_type)->orWhere('dev_charge',$request->dev_charge)->get();
    }
    // dev_district dev_type dev_charge
    elseif ($request->dev_district != null && $request->dev_type != null && $request->dev_charge != null) {
        $data = \App\Dev::where('dev_district',$request->dev_district)->orWhere('dev_type',$request->dev_type)->orWhere('dev_charge',$request->dev_charge)->get();
    }

    return json_encode($data,JSON_UNESCAPED_UNICODE);
});
//---------------------------------------------------------------------------------------------------------
//공지사항
Route::get('fyi', 'UserView\FYI\FYIViewController@index');
Route::get('fyi/{id}', 'UserView\FYI\FYIViewController@show');
Route::get('fyi_filedownload/{id}', 'UserView\FYI\FYIViewController@fyi_filedownload');

//---------------------------------------------------------------------------------------------------------
//유권해석/판례
Route::get('judicial', 'UserView\Judicial\JudicialViewController@index');
Route::get('judicial/{id}', 'UserView\Judicial\JudicialViewController@show');
Route::get('j_filedownload/{id}', 'UserView\Judicial\JudicialViewController@j_filedownload');

Route::get('hotfocus', 'UserView\Judicial\HotFocusViewController@index');
Route::get('hotfocus/{id}', 'UserView\Judicial\HotFocusViewController@show');
Route::get('hf_filedownload/{id}', 'UserView\Judicial\HotFocusViewController@hf_filedownload');

Route::get('relatednews', 'UserView\Judicial\RelatedNewsUserViewController@index');
Route::get('relatednews/{id}', 'UserView\Judicial\RelatedNewsUserViewController@show');
Route::get('rn_filedownload/{id}', 'UserView\Judicial\RelatedNewsUserViewController@rn_filedownload');

Route::get('policy', 'UserView\Judicial\PoliciesViewController@index');
Route::get('policy/{id}', 'UserView\Judicial\PoliciesViewController@show');
Route::get('p_filedownload/{id}', 'UserView\Judicial\PoliciesViewController@p_filedownload');
//---------------------------------------------------------------------------------------------------------
//자료실
Route::get('library', 'UserView\Library\LibraryViewController@index');
Route::get('library/{id}', 'UserView\Library\LibraryViewController@show');
Route::get('library_filedownload/{id}', 'UserView\Library\LibraryViewController@library_filedownload');
//---------------------------------------------------------------------------------------------------------
//공고 공시
Route::get('notice', 'UserView\Notice\NoticeViewController@index');
Route::get('notice/{id}', 'UserView\Notice\NoticeViewController@show');
Route::get('notice_filedownload/{id}', 'UserView\Notice\NoticeViewController@notice_filedownload');
//---------------------------------------------------------------------------------------------------------
//결과페이지
Route::get('detailed', 'UserView\DetailedController@index');
//---------------------------------------------------------------------------------------------------------
//관리자
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/basic');
    });

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('basic', 'Admin\Basic\SiteController@index');
    Route::get('user', 'Admin\User\UserController@index');
    Route::get('community', 'Admin\Community\CommunityController@index');

    //----------------공지사항--------------------//
    Route::get('fyi', 'Admin\FYI\FYIController@index');
    Route::post('fyifileupload', 'Admin\FYI\FYIController@fyifileupload');

    //----------------자료실--------------------//
    Route::get('library', 'Admin\Library\LibraryController@index');
    Route::post('libraryfileupload', 'Admin\Library\LibraryController@libraryfileupload');

    //-------------개발정보검색-----------------//
    Route::get('dev', 'Admin\Dev\DevController@index');
    Route::post('developmentfileupload', 'Admin\Dev\DevController@developmentfileupload');
    //---------------공고/공시-----------------//
    Route::get('notice', 'Admin\Notice\NoticeController@index');
    Route::post('noticefileupload', 'Admin\Notice\NoticeController@noticefileupload');
    //--------------유권해석판례----------------//
    Route::get('judicial', 'Admin\Judicial\JudicialController@index');
    Route::post('judicialfileupload', 'Admin\Judicial\JudicialController@judicialfileupload');

    Route::get('hotfocus', 'Admin\Judicial\HotFocusController@index');
    Route::post('hotfocusfileupload', 'Admin\Judicial\HotFocusController@hotfocusfileupload');

    Route::get('relatednews', 'Admin\Judicial\RelatedNewsController@index');
    Route::post('relatednewsfileupload', 'Admin\Judicial\RelatedNewsController@relatednewsfileupload');

    Route::get('policy', 'Admin\Judicial\PolicyController@index');
    Route::post('policyfileupload', 'Admin\Judicial\PolicyController@policyfileupload');
});
//---------------------------------------------------------------------------------------------------------