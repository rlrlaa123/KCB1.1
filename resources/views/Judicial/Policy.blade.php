@extends('layouts.app')
<style>
    .Policypage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .Policypage th, td {
        text-align: center;
        border: solid 1px transparent;
    }

</style>
@section('content')
    <div class="Policypage">
        <div class="justify-content">
            <div>@include('layouts.partials.judicialpage_list')</div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/policysearch/')}}">
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
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="tothedetailpage({{$value->p_id}})">
                        <td class="td1 ">{{$value->p_id}}</td>
                        <td class="td2">규정/지침</td>
                        <td>{{$value->p_title}}</td>
                        <td class="td1">{{$value->p_date}}</td>
                    </tr>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
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