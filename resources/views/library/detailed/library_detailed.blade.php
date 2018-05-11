@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <div class="content">
        <h4>
            자료실
        </h4>
        <table class="library_detailedtable">
            <tr>
                <td>
                    <a href="{{url('library_filedownload/'.$data->library_id)}}">파일 다운로드</a>
                </td>
                <td>
                    {{$data->library_title}}
                </td>
                <td>
                    {{$data->library_date}}
                </td>
            </tr>
            <tr>
                <td>
                    <table class="library_detailed_table_content">
                        <tr>
                            <td>
                                <p>{{$data->library_title}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>{{$data->library_content}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <img src="http://127.0.0.1:8000/{{$data->library_fileimage}}">
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