@extends('layouts.app')
<style>
    .hotfocuspage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .hotfocuspage table {
        width: 100%;

    }

    .hotfocuspage th, td {
        text-align: center;
        border: solid 1px black;
    }

    .hotfocuslist {
        text-align: left;
        width: 100%;
        list-style: none;
        padding: 0vw;
    }

    .hotfocuslist li {
        display: inline;
        padding: 1vw 2vw;
        font-size: 1vw;
    }
</style>
@section('content')
    <div class="hotfocuspage">
        <div>
            <ul class="hotfocuslist">
                <li><a href="{{url('judicial')}}">유권 해석/판례</a></li>
                <li style="font-weight:bolder; color:#e84e4e; font-size:1.1vw;"><a href="{{url('hotfocus')}}">HOT
                        포커스</a></li>
                <li><a href="{{url('policy')}}">규정 지침</a></li>
                <li><a href="{{url('relatednews')}}">관련 뉴스</a></li>
            </ul>
        </div>
        <hr/>
        <table class="pagecontent">
            <tr>
                @forelse($data as $value)
                    <td>
                        <a href="{{ url('hotfocus/'.$value->hf_id) }}">
                            <table>
                                <tr>
                                    <td>
                                        <img src="http://127.0.0.1:8000/{{ $value->hf_thumbnails }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{$value->hf_title}}
                                    </td>
                                </tr>
                            </table>
                        </a></td>
                @empty
                    <div>해당 글이 없습니다.</div>
                @endforelse
            </tr>
        </table>
        @if($data->count())
            <div class="text-center">
                {!! $data->render() !!}
            </div>
        @endif
    </div>
@endsection

{{--<div>--}}
{{--<table>--}}
{{--<thead><tr>--}}
{{--<th>번호</th><th>구분</th><th>제목</th><th>날짜</th>--}}
{{--</tr></thead>--}}
{{--@foreach($data as $value)--}}
{{--<tr>--}}
{{--<td>{{$value['id']}}</td>--}}
{{--<td>{{$value['sort']}}</td>--}}
{{--<td>{{$value['title']}}</td>--}}
{{--<td>{{$value['date']}}</td>--}}
{{--</tr>--}}
{{--@endforeach--}}

{{--</table>--}}
{{--</div>--}}
