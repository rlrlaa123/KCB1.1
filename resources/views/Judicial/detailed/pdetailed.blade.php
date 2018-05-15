@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>

        .pdetailedtable {
            width: 100%;
            max-width: 1200px;
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
            border-bottom: 1px solid lightgrey;
        }

        .content_name {
            font-weight: 700;
            background-color: #fcefec;
            width: 6%;
        }

        .pdetailedtable td {
            padding: 1vw 0.5vw;
            text-align: center;
            border: 1px solid black;
            font-size: 1vw;
        }
        .filled{
            -ms-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space: pre-line;
            word-break: break-all;
            overflow: hidden;
            width:15%
        }

        .pdetailedtable table {
            border-collapse: collapse;
            border: 1px solid black;
            margin: 1vw;
            width:100%;
            overflow: auto;
        }
        .pdetailedtable td p{
            max-height: 700px;
            vertical-align: middle;
            width:100%;
            overflow-y: scroll;
            word-break: break-all;
            padding:1vw;
        }
        .title_filled{
            width: 8%;
            max-width:400px;
            height: 10vh;
            padding:0.5vw;
            white-space: pre-line;
            white-space:-moz-pre-wrap;
            overflow: auto;
        }
        .writer_filled{
            width:5%;
            padding:1vw;

        }
        .date_filled{
            width:7%;
            padding:1vw;
        }

    </style>
    <div class="content">
        <h4>
            규정지침
        </h4>
        @include('layouts.partials.detailpage_list')
        <div>
            <div class="content_title"><strong>{{$data->p_title}}</strong><span>작성일 : {{$data->p_date}}</span>
            </div>
        <div class="pdetailedtable">
            <table>
                <tr>
                    <td class="content_name">제목</td>
                    <td class="title_filled">{{$data->p_title}}</td>
                    <td class="content_name">작성자</td>
                    <td class="writer_filled">관리자</td>
                    <td class="content_name">등록일</td>
                    <td class="date_filled">{{$data->p_date}}</td>
                </tr>
                <tr>
                    <td class="content_name">첨부파일</td>
                    <td colspan="5" class="filled"><a href="{{url('p_filedownload/'.$data->p_id)}}">파일 다운로드 Date:{{$data->p_date}}</a>
                    </td>
                </tr>
                <tr>
                    <td class="content_name">내용</td>
                    <td colspan="5"><p>{{$data->p_content}}</p></td>
                </tr>
            </table>
        </div>
        <div class="table_footer">
                <span><a href="{{url('policy/'.$previous)}}">이전글</a>
                    <a href="{{url('policy/'.$next)}}">다음글</a>
                </span><a href="{{url('policy')}}">목록</a>
        </div>
    </div>
@endsection