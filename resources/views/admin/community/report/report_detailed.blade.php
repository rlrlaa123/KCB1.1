@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .reportdetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
          신고하기
        </h4>
        <div>
            <div class="content_title"><strong>{{$data->report_title}}</strong><span>작성일 : {{$data->report_date}}</span></div>
            <table class="reportdetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : {{$data->report_user}} 작성자 이메일 : {{$data->report_user_email}}
                        </div>
                    </td>
                    <td>
                        <div class="writer_and_filedownload">작성자 이메일 : {{$data->report_user_email}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="reportdetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->report_content}}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('admin/report/'.$previous)}}">이전글</a> <a href="{{url('admin/report/'.$next)}}">다음글</a>  </span><a href="/admin/report/">목록</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection