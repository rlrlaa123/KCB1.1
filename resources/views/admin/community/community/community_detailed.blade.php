@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .articlesdetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
            커뮤니티
        </h4>
        <div>
            <div class="content_title"><strong>{{$data->title}}</strong><span>작성일 : {{$data->created_at}}</span></div>
            <table class="articlesdetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : {{$data->user_id}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="articlesdetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->content}}</p>
                                        <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('/admin/articles/'.$previous)}}">이전글</a> <a href="{{url('/admin/articles/'.$next)}}">다음글</a>  </span><a href="{{url('/admin/articles/')}}">목록</a>
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