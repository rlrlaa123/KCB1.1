@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>

        .jdetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
           유권해석&판례
        </h4>
        @include('layouts.partials.detailpage_list')
        <div>
            <div class="content_title"><strong>{{$data->j_title}}</strong><span>작성일 : {{$data->j_date}}</span>
            </div>
            <table class="jdetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : 관리자 <span>
                                <a href="{{url('j_filedownload/'.$data->j_id)}}">파일 다운로드 Date:{{$data->j_date}}</a></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="jdetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->j_content}}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('judicial/'.$previous)}}">이전글</a>
                                            <a href="{{url('judicial/'.$next)}}">다음글</a>
                                        </span><a
                                                href="{{url('judicial')}}">목록</a>
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