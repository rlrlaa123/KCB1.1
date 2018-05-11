@extends('layouts.app')
<style>
    .librarypage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .librarypage table {
        width: 100%;
    }

    .librarypage th, td {
        text-align: center;
        border: solid 1px black;
    }

    .librarylist {
        text-align: left;
        width: 100%;
        list-style: none;
        padding: 0;
    }

    .librarylist li {
        display: inline;
        padding: 1vw 2vw;
        font-weight: bolder;
        font-size: 1.1vw;
    }

</style>
@section('content')
    <div class="librarypage">
        <div>
            <ul class="librarylist">
                <li>자료실1</li>
            </ul>
        </div>
        <hr/>
        <div>
            <table class="pagecontent">
                <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>날짜</th>
                </tr>
                </thead>
                @forelse($data as $value)
                    <a href="{{ url('library/'.$value->library_id) }}">
                        <tr>
                            <td>{{$value->library_id}}</td>
                            <td>{{$value->library_title}}</td>
                            <td>{{$value->library_date}}</td>
                        </tr>
                    </a>
                @empty
                    <td colspan="3">해당 글이 없습니다.</td>
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
