@extends('layouts.app')
<style>
    .RNpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .RNpage th, td {
        text-align: center;
        border: solid 1px transparent;
    }

</style>
@section('content')
    <div class="RNpage">
        <div class="justify-content">
            <div>@include('layouts.partials.judicialpage_list')</div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/relatednewssearch/')}}">
                    <input type="search" name="search" class="form-control" placeholder="검색어를 입력하세요."
                           style="height: 3vh; width: 15vw; padding:0;">
                    <button type="submit" class="lens_button1"><img
                                src="http://127.0.0.1:8000/img/searchbarbutton1.png"/>
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
                @forelse($relatednews as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('relatednews/'.$value->rn_id)}}'">
                        <td class="td1">{{$value->rn_id}}</td>
                        <td class="td2">관련 뉴스</td>
                        <td>{{$value->rn_title}}</td>
                        <td class="td1">{{$value->rn_date}}</td>
                    </tr>
                @empty
                    <td colspan="4"><b style="color:red;">"{{$requests->search}}"</b>에 대해 검색하신 결과가 없습니다.</td>
                @endforelse
                </tbody>
            </table>
            @if($relatednews->count())
                <div class="text-center">
                    {!! $relatednews->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
