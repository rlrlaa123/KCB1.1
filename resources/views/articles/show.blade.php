@extends('layouts.app')
@include('detailedpage.detailed_style')
<style>
    /*.articleshowpage {*/
    /*margin: 1vw 15vw 1vw 15vw;*/
    /*}*/
    .content {
        font-size: 1.3vw;
    }

    table {
        font-size: 10px;
    }

    .article-btn-wrapper {
        text-align: right;
        border-bottom: 0 !important;
        border-top: 0 !important;
    }

    .article-btn-wrapper a {
        color: black;
        font-weight: lighter;
        font-size: 9px;
        margin: 0 2px;
        font-style: italic;
    }
</style>
<script>
    @if($messaged = Session::get('success'))
    alert('수정하신 내용이 저장되었습니다.');
    @endif
</script>

@section('content')
    <div class="content">
        <h4>
            자료실
        </h4>
        @include('layouts.partials.detailpage_list')
        <div>
            <div class="content_title"><strong>{{$article->title}}</strong><span>작성일 : {{$article->created_at}}</span>
            </div>
            <table class="librarydetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload" style="padding: 5px;">
                            작성자 : 관리자
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="librarydetailed_table_content">
                            <tr>
                                <td>
                                    <div style="border-bottom: 0;">
                                        <p>{{$article->content}}</p>
                                        <div class="article-btn-wrapper">
                                            @if($article->user->id==\Illuminate\Support\Facades\Auth::user()->id)
                                                <a href="{{route('articles.edit', $article->id)}}" class="">
                                                    글 수정
                                                </a>
                                            @endif
                                            @if($article->user->id==\Illuminate\Support\Facades\Auth::user()->id)
                                                <a class="button__delete">
                                                    글 삭제
                                                </a>
                                            @endif
                                            <a href="{{route('articles.index')}}" class="">
                                                글 목록
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer" style="margin: 0; padding: 10px 0;">
                                        <span><a href="{{url('articles/'.$previous)}}">이전글</a>
                                            <a href="{{url('articles/'.$next)}}">다음글</a></span>
                                        <a href="{{url('search')}}">목록</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{--<div class="articleshowpage">--}}
    {{--<div class="page-header">--}}
    {{--<h4 style="font-weight: 700;">커뮤니티--}}
    {{--<b style="font-weight:700; font-size:1.1vw;"> / {{$article->title}}</b>--}}
    {{--</h4>--}}
    {{--</div>--}}
    {{--<article data-id="{{$article->id}}">--}}
    {{--@include('articles.partial.article', compact('article'))--}}
    {{--</article>--}}
    {{--<div class="text-center action__article">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@stop--}}
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.button__delete').on('click', function (e) {
            var articleId = $('article').data('id');

            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/articles/' + articleId
                }).then(function () {
                    window.location.href = '/articles';
                })
            }
        });
    </script>
@stop