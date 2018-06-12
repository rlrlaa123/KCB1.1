@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>

        .noticedetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
            공고/공시
        </h4>
        <div>
            <div class="content_title"><strong>{{$data->notice_title}}</strong><span>작성일 : {{$data->notice_date}}</span></div>
            <table class="noticedetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : 관리자 <span><a
                                        href="{{url('notice_filedownload/'.$data->notice_id)}}">파일 다운로드 Date:{{$data->notice_date}}</a></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="noticedetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p style="overflow: auto;">{{$data->notice_content}}</p>
                                        <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img style="width:100%; max-height:1100px; overflow: scroll" src="/{{$data->notice_fileimage}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('notice/'.$previous)}}">이전글</a> <a href="{{url('notice/'.$next)}}">다음글</a>  </span><a href="{{url('notice')}}">목록</a>
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