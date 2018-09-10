@extends('layouts.app')
<style>
    .asking_page {
        margin: 1vw 15vw 1vw 15vw;
    }

    .asking_page th, td {
        text-align: center;
        border: solid 1px transparent;

    }

    .asking_new {
        -webkit-border-radius: 4vw;
        -moz-border-radius: 4vw;
        border-radius: 4vw;
        background-color: #e85254;
        padding: 1vw;
        text-align: center;
        color: white;
        font-size: 1vw;
        font-weight: lighter;
    }


</style>
@section('content')
    <div class="asking_page">
        <div>@include('layouts.partials.communitylist')</div>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th2 table_id">번호</th>
                    <th class="th1 table_title">제목</th>
                    <th class="th2 table_date">날짜</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    @if($value->asking_password != null)
                        <tr class="tothedetailpage">
                            {{--onclick="passwordpopup({{$value->id}})">--}}
                            <td class=" td2">{{$value->id}}</td>
                            <td style="text-align:left; padding:1vw" onclick="passwordpopup({{ $value->id }})">
                                비공개글입니다.
                                <img src="/img/padlock.png" style="width:23px; margin-left:1vw;">
                            </td>
                            <td class="td1">{{$value->created_at}}</td>
                        </tr>
                    @else
                        <tr class="tothedetailpage" onclick="tothedetailpage({{$value->id}})">
                            <td class=" td2">{{$value->id}}</td>
                            <td style="text-align:left; padding:1vw">{{$value->asking_title}}</td>
                            <td class="td1">{{$value->created_at}}</td>
                        </tr>
                    @endif
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

            <div class="text-right">
                <a href="{{url('/ask')}}" class="asking_new">새 글 쓰기</a></div>
        </div>
    </div>
    <script>
        function passwordpopup(asking_id) {
            var role = "{{ Illuminate\Support\Facades\Auth::user()->checkPremium(Illuminate\Support\Facades\Auth::user()->grade) }}";
            if (role === "1") {
                location.href = 'asking/' + asking_id;
            } else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
        }

        function tothedetailpage(id) {
            var role = "{{ Illuminate\Support\Facades\Auth::user()->checkPremium(Illuminate\Support\Facades\Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/asking/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
        }
    </script>
@endsection