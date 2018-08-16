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
            <div class="content_title"><strong>{{$data->notice_title}}</strong><span>작성일 : {{$data->notice_date}}</span>
            </div>
            <table class="noticedetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload"><div>작성자 : 관리자</div>
                            <div>
                                @foreach($data1 as $download)
                                    <div style="padding:0; margin:0;">
                                    <a href="{{url('notice_filedownload/'.$download->id)}}">{{$download->notice_id}}.{{$download->id}} 파일 다운받기</a></div>
                                @endforeach</div>
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
                                        <p>[원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            @foreach($data1 as $image)
                                @if (@is_array(getimagesize($image['fileimage'])))
                                    <tr>
                                        <td>

                                            <img style="width:100%; height:100%; overflow: scroll"
                                                 src="/{{$image->fileimage}}" width="100%">

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