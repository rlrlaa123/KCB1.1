@extends('layouts.app')
<style>
    .Policypage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .Policypage table {
        width: 100%;

    }

    .Policypage th, td {
        text-align: center;
        border: solid 1px black;
    }

    .Policylist {
        text-align: left;
        width: 100%;
        list-style: none;
        padding: 0vw;
    }

    .Policylist li {
        display: inline;
        padding: 1vw 2vw;
        font-size: 1vw;
    }

</style>
@section('content')
    <div class="Policypage">
        <div>
            <ul class="Policylist">
                <li><a href="{{url('judicial')}}">유권 해석/판례</a></li>
                <li><a href="{{url('hotfocus')}}">HOT 포커스</a></li>
                <li style="font-weight:bolder; color:#e84e4e; font-size:1.1vw;"><a href="{{url('policy')}}">규정 지침</a>
                </li>
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
                    <tr>
                        <td>{{$value->p_id}}</td>
                        <td>규정/지침</td>
                        <td><a href="{{ url('policy/'.$value->p_id) }}">{{$value->p_title}}</a></td>
                        <td>{{$value->p_date}}</td>
                    </tr>
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