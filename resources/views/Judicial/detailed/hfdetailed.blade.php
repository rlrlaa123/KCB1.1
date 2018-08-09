@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .hfdetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
            HOT 포커스
        </h4>
        @include('layouts.partials.detailpage_list')
        <div>
            <div class="content_title"><strong>{{$data->hf_title}}</strong><span>작성일 : {{$data->hf_date}}</span></div>
            <table class="hfdetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : 관리자 <span><a
                                        href="{{url('hf_filedownload/'.$data->hf_id)}}">파일 다운로드 Date:{{$data->hf_date}}</a></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="hfdetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->hf_content}}</p>
                                        <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if (@is_array(getimagesize($data['hf_fileimage'])))
                                        <img style="width:100%; height:100%; overflow: scroll" src="/{{$data->hf_fileimage}}">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                    <span><a href="{{url('hotfocus/'.$previous)}}">이전글</a> <a href="{{url('hotfocus/'.$next)}}">다음글</a>  </span><a href="{{url('hotfocus')}}">목록</a>
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