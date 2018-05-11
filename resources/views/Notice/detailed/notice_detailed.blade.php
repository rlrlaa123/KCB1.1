@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <div class="content">
        <h4>
            공고/공시
        </h4>

        <div>
            <h2>

            </h2>
            <table class="notice_detailedtable">
                <tr>
                    <td>
                        <a href="{{url('notice_filedownload/'.$data->notice_id)}}">파일 다운로드</a>
                    </td>
                    <td>
                        {{$data->notice_title}}
                    </td>
                    <td>
                        {{$data->notice_date}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="notice_detailed_table_content">
                            <tr>
                                <td>
                                    <p>{{$data->notice_title}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{$data->notice_content}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        <img src="http://127.0.0.1:8000/{{$data->notice_fileimage}}">
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