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
        <div class="justify-content">
            <div>@include('layouts.partials.judicialpage_list')</div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/hotfocussearch/')}}">
                    <input type="search" name="search" class="form-control" placeholder="검색어를 입력하세요."
                           style="height: 3vh; width: 15vw; padding:0;">
                    <button type="submit" class="lens_button1"><img
                                src="/img/searchbarbutton1.png"/>
                    </button>
                </form>
            </div>
        </div>
        <hr/>
        <table>
            <tr>
                @forelse($data as $value)
                    <td class="pagecontents_td">
                        <a onclick="tothedetailpage({{$value->hf_id}})">
                            <table>
                                <tr>
                                    <td>
                                    <div class="image_text_container"><img src="/{{ $value->hf_thumbnails }}">
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

    <script>
        function tothedetailpage(id) {
            // Premium 회원일 때만 접근 가능!
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/hotfocus/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
        }
    </script>
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
