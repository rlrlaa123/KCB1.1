@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <div class="content">
        <h4>
            공지사항
        </h4>
        <table class="fyi_detailedtable">
            <tr>
                <td>
                    <a href="{{url('fyi_filedownload/'.$data->fyi_id)}}">파일 다운로드</a>
                </td>
                <td>
                    {{$data->fyi_title}}
                </td>
                <td>
                    {{$data->fyi_date}}
                </td>
            </tr>
            <tr>
                <td>
                    <table class="fyi_detailed_table_content">
                        <tr>
                            <td>
                                <p>{{$data->fyi_title}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>{{$data->fyi_content}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <img src="http://127.0.0.1:8000/{{$data->fyi_fileimage}}">
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