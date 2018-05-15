@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')    <style>

    .fyidetailedtable div {
        text-align: left;
        padding: 0.8vw 2vw;
        font-size: 1vw;
    }

</style>
<div class="content">
    <h4>
       공지사항
    </h4>
    @include('layouts.partials.detailpage_list')
    <div>
        <div class="content_title"><strong>{{$data->fyi_title}}</strong><span>작성일 : {{$data->fyi_date}}</span></div>
        <table class="fyidetailedtable">
            <tr>
                <td>
                    <div class="writer_and_filedownload">작성자 : 관리자 <span><a
                                    href="{{url('fyi_filedownload/'.$data->fyi_id)}}">파일 다운로드 Date:{{$data->fyi_date}}</a></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="fyidetailed_table_content">
                        <tr>
                            <td>
                                <div>
                                    <p>{{$data->fyi_content}}</p>
                                    <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><img src="http://127.0.0.1:8000/{{$data->fyi_fileimage}}"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="table_footer">
                                    <span><a href="{{url('fyi/'.$previous)}}">이전글</a> <a href="{{url('fyi/'.$next)}}">다음글</a>  </span><a href="{{url('fyi')}}">목록</a>
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