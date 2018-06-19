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
           @include('layouts.partials.library_list')
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/librarysearch/')}}">
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
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="tothedetailpage({{$value->library_id}})">
                        <td class="td1">{{$value->library_id}}</td>
                        <td class="library_title">{{$value->library_title}}</td>
                        <td class="td1">{{$value->library_date}}</td>
                    </tr>
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

    <script>
        function tothedetailpage(id) {
            @if(\Illuminate\Support\Facades\Auth::guest())
            alert('회원 가입 후에 열람하실 수 있습니다.');
            @else
            // Premium 회원일 때만 접근 가능!
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/library/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
            @endif
        }
    </script>
@endsection