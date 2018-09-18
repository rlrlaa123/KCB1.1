@extends('layouts.app')
<style>
    .community_page {
        margin: 1vw 15vw 1vw 15vw;
    }

    .community_page th, td {
        text-align: center;
        border: solid 1px transparent;
    }

    .write_new_article {
        -webkit-border-radius: 4vw;
        -moz-border-radius: 4vw;
        border-radius: 4vw;
        background-color: #e85254;
        padding: 1vh 1vw;
        text-align: center;
        color: white;
        font-size: 1vw;
        font-weight: lighter;
    }

</style>
@section('content')
    <div class="community_page">
        @include('layouts.partials.communitylist')
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
                @forelse($articles as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('articles/'.$value->id)}}'">
                        <td class="td2">{{$value->id}}</td>
                        <td style="text-align:left; padding:1vw">{{$value->title}}</td>
                        <td class="td1">{{$value->created_at}}</td>
                    </tr>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
                @endforelse
                </tbody>
            </table>
            @if($articles->count())
                <div class="text-center">
                    {!! $articles->render() !!}
                </div>
            @endif
            <div class="text-right">
                <a onclick="create()" class="write_new_article">새 글 쓰기</a></div>
        </div>
    </div>
    <script>
        function create() {
            @if(\Illuminate\Support\Facades\Auth::guest())
            alert('회원 가입 후에 작성하실 수 있습니다.');
            @else
            // Premium 회원일 때만 접근 가능!
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "{{route('articles.create')}}";
            }
            else {
                alert('프리미엄 회원만 작성이 가능합니다.');
            }
            @endif
        }
    </script>
@endsection