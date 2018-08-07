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
        padding: 1vw;
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
        <h4>자유게시판</h4>
        <small>글 목록</small>
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
                <a href="{{route('articles.create')}}" class="write_new_article">새 글 쓰기</a></div>
        </div>
    </div>
@endsection