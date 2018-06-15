@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .articlesdetailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

    </style>
    <div class="content">
        <h4>
            커뮤니티
        </h4>
        <div>
            <div class="content_title"><strong>{{$data->title}}</strong><span>작성일 : {{$data->created_at}}</span></div>
            <table class="articlesdetailedtable">
                <tr>
                    <td>
                        <div class="writer_and_filedownload">작성자 : {{$data->user->name}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="articlesdetailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->content}}</p>
                                        <p>[이미지 원본 파일을 보시려면 우측 상단의 파일 다운로드를 이용해주시기 바랍니다.]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_footer">
                                        <span><a href="{{url('/admin/community/'.$previous)}}">이전글</a>
                                            <a href="{{url('/admin/community/'.$next)}}">다음글</a></span>
                                        <a href="{{url('/admin/community/')}}">목록</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                        <button class="button__delete">
                                            글 삭제
                                        </button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.button__delete').on('click', function (e) {
            var articleId = "{{$articles->id}}"

            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/articles/' + articleId
                }).then(function () {
                    window.location.href = '/admin/community';
                })
            }
        });
    </script>
@endsection
