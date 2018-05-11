@extends('layouts.app')
<style>
    .judicialpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .judicialpage table {
        width: 100%;

    }

    .judicialpage th, td {
        text-align: center;
        border: solid 1px black;
    }

    .judiciallist {
        text-align: left;
        width: 100%;
        list-style: none;
        padding: 0vw;
    }

    .judiciallist li {
        display: inline;
        padding: 1vw 2vw;
        font-size: 1vw;
    }

</style>
@section('content')
    <div class="judicialpage">
        <div>
            <ul class="judiciallist">
                <li style="font-weight:bolder; color:#e84e4e; font-size:1.1vw;"><a href="{{url('judicial')}}">유권
                        해석/판례</a></li>
                <li><a href="{{url('hotfocus')}}">HOT 포커스</a></li>
                <li><a href="{{url('policy')}}">규정 지침</a></li>
                <li><a href="{{url('relatednews')}}">관련 뉴스</a></li>
            </ul>
        </div>
        <hr/>
        <div>
            <table class="pagecontent">
                <thead>
                <tr>
                    <th>번호</th>
                    <th>구분</th>
                    <th>제목</th>
                    <th>날짜</th>
                </tr>
                </thead>
                @forelse($data as $value)
                    <a href="{{ url('judicial/'.$value->j_id) }}">
                        <tr>
                            <td>{{$value->j_id}}</td>
                            <td>{{$value->dash_id}}</td>
                            <td>{{$value->j_title}}</td>
                            <td>{{$value->j_date}}</td>
                        </tr>
                    </a>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
                @endforelse
            </table>
            @if($data->count())
                <div class="text-center">
                    {!! $data->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
