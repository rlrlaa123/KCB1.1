@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>

        .librarydetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 0.9vw;
        }

    </style>
    <div class="content">
        <h4>
           자료실
        </h4>
        @include('layouts.partials.library_list')
        <div>
            <div class="content_title"><strong>{{$data->library_title}}</strong><span>작성일 : {{$data->library_date}}</span>
            </div>
            <table class="librarydetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : 관리자 <span><a
                                        href="{{url('library_filedownload/'.$data->library_id)}}">파일 다운로드 Date:{{$data->library_date}}</a></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="librarydetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{!! $data->library_content!!}</p>
                                        <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><img src="/{{$data->library_fileimage}}"/></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('library/'.$previous)}}">이전글</a>
                                            <a href="{{url('library/'.$next)}}">다음글</a></span>
                                        <a href="{{url('library/')}}">목록</a>
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