@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .askingdetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
            상담하기
        </h4>
        <div>
            <div class="content_title"><strong>{{$data->asking_title}}</strong><span>작성일 : {{$data->asking_date}}</span></div>
            <table class="askingdetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : {{$data->asking_user}} 작성자 이메일: {{$data->asking_user_email}}
                            <span><a href="{{url('/asking_filedownload/'.$data->id)}}">파일 다운로드 Date:{{$data->asking_date}}</a></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="askingdetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->asking_content}}</p>
                                        <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><img src="http://127.0.0.1:8000/{{$data->asking_file}}"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('/admin/asking/'.$previous)}}">이전글</a> <a href="{{url('/admin/asking/'.$next)}}">다음글</a>  </span><a href="/admin/asking/">목록</a>
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