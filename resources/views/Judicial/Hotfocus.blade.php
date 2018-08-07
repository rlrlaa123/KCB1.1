@extends('layouts.app')
<style>
    .hotfocuspage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .hotfocuspage table {
        width: 100%;
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
            <tr class="display_grid">
                @forelse($data as $value)
                    <td class="grid-item">
                        <a onclick="tothedetailpage({{$value->hf_id}})">
                            <table>
                                <tr>
                                    <td>
                                        <div class="image_text_container"><img
                                                    src="/{{$value->hf_thumbnails}}">
                                            <div class="text-block" style="width:100%;"><p>{{$value->hf_title}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </td>
                @empty
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
            @if(\Illuminate\Support\Facades\Auth::guest())
            alert('회원 가입 후에 열람하실 수 있습니다.');
            @else
            // Premium 회원일 때만 접근 가능!
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/hotfocus/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
            @endif
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
