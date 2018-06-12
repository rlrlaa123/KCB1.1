@extends('layouts.app')
<style>
    .judicialpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .judicialpage th, td {
        text-align: center;
        border: solid 1px transparent;
    }


</style>
@section('content')
    <div class="judicialpage">
        <div class="justify-content">
            <div>@include('layouts.partials.judicialpage_list')</div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/judicialsearch/')}}">
                    <input type="search" name="search" class="form-control" placeholder="검색어를 입력하세요."
                           style="height: 3vh; width: 15vw; padding:0;">
                    <button type="submit" class="lens_button1"><img
                                src="/img/searchbarbutton1.png"/>
                    </button>
                </form>
            </div>
        </div>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id">번호</th>
                    <th class="th2 table_dash_id">구분</th>
                    <th class="th1 table_title">제목</th>
                    <th class="th2 table_date">날짜</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('judicial/'.$value->j_id)}}'">
                        <td class="td1">{{$value->j_id}}</td>
                        <td class="td2">보상판례</td>
                        <td>{{$value->j_title}}</td>
                        <td class="td1">{{$value->j_date}}</td>
                    </tr>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
                @endforelse
                </tbody>
            </table>
            @if($data->count())
                <div class="text-center">
                    {!! $data->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
