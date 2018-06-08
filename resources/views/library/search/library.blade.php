@extends('layouts.app')
<style>
    .librarypage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .table_id {
        width: 5%;
    }

    .table_date {
        width: 15%;
    }

    .library_title {
        background-color: white;
    }

    .librarypage th, td {
        text-align: center;
        border: solid 1px transparent;
    }

    .library-selector {
        cursor: pointer;
        padding: 0.7vw;
        font-weight: 600;
        justify-content: left;
        text-align: left;
        font-size: 1.5vw;
        width: 25%;
        color: black
    }

    .library-selector:hover {
        font-size: 1.7vw;
        color: #e85254;
        font-weight: 800;
    }

</style>
@section('content')
    <div class="librarypage">
        <div class="justify-content">
            <div class="library-selector {{ $_SERVER['REQUEST_URI'] === '/library' ? 'judicialpage_list_onpage' : ''}}"
                 onclick="location.href='/library';">자료실
            </div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/librarysearch/')}}">
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
                    <th class="th2 table_id">번호</th>
                    <th class="th1">제목</th>
                    <th class="th2 table_date">날짜</th>
                </tr>
                </thead>
                @forelse($library as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('library/'.$value->library_id)}}'">
                        <td class="td1">{{$value->library_id}}</td>
                        <td class="library_title">{{$value->library_title}}</td>
                        <td class="td1">{{$value->library_date}}</td>
                    </tr>
                @empty
                    <td colspan="3"><b style="color:red;">"{{$requests->search}}"</b>에 대해 검색하신 결과가 없습니다.</td>
                @endforelse
            </table>
            @if($library->count())
                <div class="text-center">
                    {!! $library->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
