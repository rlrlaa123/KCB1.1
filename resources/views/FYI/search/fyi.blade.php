@extends('layouts.app')
<style>
    .fyipage {
        margin: 1vw 15vw 1vw 15vw;
    }
    .table_id {
        width: 5%;
    }

    .table_date {
        width: 15%;
    }

    .fyi_title {
        background-color: white;
    }

    .fyipage table {
        width: 100%;
    }

    .fyipage th, td {
        text-align: center;
        border: solid 1px black;
    }
    .fyipage th, td {
        text-align: center;
        border: solid 1px transparent;
    }

    .fyi-selector {
        cursor: pointer;
        padding: 0.7vw;
        font-weight: 600;
        justify-content: left;
        text-align: left;
        font-size: 1.5vw;
        width: 25%;
        color: black
    }


</style>
@section('content')
    <div class="fyipage">
        <div class="justify-content">
            <div class="fyi-selector"onclick="location.href='/fyi';">공지사항</div><div>
                <form class="navbar-form searchform" method="GET" action="{{url('/fyisearch/')}}">
                    <input type="search" name="search" class="form-control" placeholder="검색어를 입력하세요."
                           style="height: 3vh; width: 15vw; padding:0;">
                    <button type="submit" class="lens_button1"><img src="/img/searchbarbutton1.png"/>
                    </button>
                </form>
            </div>
        </div>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th2 table_id">번호</th>
                    <th class="th1">제목</th>
                    <th class="th2 table_date">날짜</th>
                </tr>
                </thead>
                @forelse($fyi as $value)
                        <tr class="tothedetailpage" onclick="location.href='{{url('fyi/'.$value->fyi_id)}}'">
                            <td class="td1">{{$value->fyi_id}}</td>
                            <td class="fyi_title">{{$value->fyi_title}}</td>
                            <td class="td1">{{$value->fyi_date}}</td>
                        </tr>
                @empty
                    <td colspan="3"><b style="color:red;">"{{$requests->search}}"</b>에 대해 검색하신 결과가 없습니다.</td>
                @endforelse
            </table>
            @if($fyi->count())
                <div class="text-center">
                    {!! $fyi->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
