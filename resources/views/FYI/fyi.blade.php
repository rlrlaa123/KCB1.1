@extends('layouts.app')
<style>
    .fyipage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .fyipage table {
        width: 100%;
    }

    .fyipage th, td {
        text-align: center;
        border: solid 1px black;
    }

    .fyilist {
        text-align: left;
        width: 100%;
        list-style: none;
        padding: 0;
    }

    .fyilist li {
        display: inline;
        padding: 1vw 2vw;
        font-weight: bolder;
        font-size: 1.1vw;
    }

</style>
@section('content')
    <div class="fyipage">
        <div>
            <ul class="fyilist">
                <li>공지사항</li>
            </ul>
        </div>
        <hr/>
        <div>
            <table class="pagecontent">
                <thead>
                <tr>
                    <th>공지 번호</th>
                    <th>공지 제목</th>
                    <th>공지 날짜</th>
                </tr>
                </thead>
                @forelse($data as $value)
                    <a href="{{ url('fyi/'.$value->fyi_id) }}">
                        <tr>
                            <td>{{$value->fyi_id}}</td>
                            <td>{{$value->fyi_title}}</td>
                            <td>{{$value->fyi_date}}</td>
                        </tr>
                    </a>
                @empty
                    <td colspan="3">등록된 공지사항이 없습니다.</td>
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
