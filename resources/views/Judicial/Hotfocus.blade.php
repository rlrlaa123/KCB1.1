@extends('layouts.app')
<style>
    .image_text_container {
        position: relative;
        width: 14vw;
        height: 19vh;
    }

    /* Bottom right text */
    .text-block {
        background-color: black;
        bottom: 0;
        color: white;
        width: 100%;
        opacity: 0.6;
        text-align: center;
        padding:0;
        margin:0;
    }
    .text-block p{
        margin:0;
        text-align: center;
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        bottom:0;
        width:100%;
        height:20%;

    }
    .hotfocuspage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .hotfocuspage table {
        width: auto;
    }

    .hotfocuspage img {
        width: 100%;
        height: 80%;
    }

    .hotfocuspage td {
        display: inline-flex;
        justify-content: space-between;
    }



</style>
@section('content')
    <div class="hotfocuspage">
        @include('layouts.partials.judicialpage_list')
        <hr/>
        <table>
            <tr>
                @forelse($data as $value)
                    <td class="pagecontents_td">
                        <a href="{{ url('hotfocus/'.$value->hf_id) }}">
                            <table>
                                <tr>
                                    <td>
                                    <div class="image_text_container"><img src="http://127.0.0.1:8000/{{ $value->hf_thumbnails }}">
                                        <div class="text-block"><p>{{$value->hf_title}}</p></div></div>
                                    </td>
                                </tr>
                            </table>
                        </a></td>
                @empty
                    <div>등록된 HOT 포커스 게시물이 없습니다.</div>
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
