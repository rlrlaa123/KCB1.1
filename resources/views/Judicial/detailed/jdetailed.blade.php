@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <div class="content">
    <h4>
        유권해석/판례
    </h4>

    <div>
        <ul class="detailed">
            <li><a href="{{url('judicial')}}">유권 해석/판례</a></li>
            <li><a href="{{url('hotfocus')}}">HOT 포커스</a></li>
            <li><a href="{{url('policy')}}">규정 지침</a></li>
            <li><a href="{{url('relatednews')}}">관련 뉴스</a></li>
        </ul>
    </div>
    <div>
        <h2>

        </h2>
    <table class="jdetailedtable">
        <tr>
            <td>
                <a href="{{url('j_filedownload/'.$data->j_id)}}">파일 다운로드</a>
            </td>
            <td>
                {{$data->j_title}}
            </td>
            <td>
                {{$data->j_date}}
            </td>
        </tr>
        <tr>
            <td>
                <table class="jdetailed_table_content">
                    <tr>
                        <td>
                            <p>{{$data->j_title}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>{{$data->j_content}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <img src="http://127.0.0.1:8000/{{$data->j_fileimage}}">
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </div>
    </div>
    @endsection