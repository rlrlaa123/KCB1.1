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
            공고/고시
        </h4>
        <div>
            <div class="content_title"><strong>{{$data->notice_title}}</strong><span>작성일 : {{$data->notice_date}}</span>
            </div>
            <table class="noticedetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload"><div>작성자 : 관리자</div>
                            <div>
                                @foreach($file as $download)
                                    <div style="padding:0; margin:0;">
                                    <a href="{{url('notice_filedownload/'.$download->id)}}">{{$download->notice_id}}.{{$download->id}} 파일 다운받기</a></div>
                                @endforeach</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="noticedetailed_table_content">
                            @foreach($data1 as $image)
                                @if (@is_array(getimagesize($image['fileimage'])))
                                    <tr>
                                        <td>

                                            <img src="/{{$image->fileimage}}">
                                        </td>
                                    </tr>
                                @else
                                @endif
                            @endforeach
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('notice/'.$previous)}}">이전글</a> <a
                                                    href="{{url('notice/'.$next)}}">다음글</a>  </span><a
                                                href="{{url('notice')}}">목록</a>
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