@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>

        .rndetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
            관련 뉴스
        </h4>
        @include('layouts.partials.detailpage_list')
        <div>
            <div class="content_title"><strong>{{$data->rn_title}}</strong><span>작성일 : {{$data->rn_date}}</span>
            </div>
            <table class="rndetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : 관리자</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="rndetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->rn_content}}</p>
                                        <p>{{$data->rn_link}}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('relatednews/'.$previous)}}">이전글</a>
                                            <a href="{{url('relatednews/'.$next)}}">다음글</a>
                                        </span><a href="{{url('relatednews')}}">목록</a>
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