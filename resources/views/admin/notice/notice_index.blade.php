@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .btn {
            border: 1px solid lightgrey;
            /*color: grey;*/
            padding: 0.8vw 1.5vw;
            border-radius: 1vw;
            -webkit-border-radius: 1vw;
            color: red;
            font-weight: lighter;
            text-decoration: none;
        }
    </style>
    <div class="askingpage">
        <div style="display:flex; justify-content: space-between; align-items: center;"><h3>공고 공시 목록</h3>
            <div style="cursor:pointer; border:2px solid #e85254; background-color: #e85254; color:white; padding:0.5vw; font-size:1vw; -webkit-border-radius: 1vw;-moz-border-radius: 1vw;border-radius: 1vw;"
                 onclick="location.href='{{url('/admin/notice/create')}}'">공고 공시 추가
            </div>
        </div>

        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id">번호</th>
                    <th class="th1"></th>
                    <th class="th1 table_title">제목</th>
                    <th class="th2 table_content">공고 공시 내용</th>
                    <th class="th2 table_created_at">공고 공시 생성일</th>
                    <th class="th2"></th>
                    <th class="th2"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage">
                        <td class="td1">{{$value->id}}</td>
                        {{--@if($value->notice_thumbnails != null)--}}
                        {{--<td class="td1"><img src="/{{$value->notice_thumbnails}}"></td>--}}
                        {{--@else--}}
                        <td class="td1"><img src="/img/no_image.jpg"></td>
                        {{--@endif--}}
                        <td class="td1">{{$value->notice_title}}</td>
                        <td class="td1">{{$value->notice_content}}</td>
                        <td class="td1">{{ $value->created_at }}</td>
                        <td class="td1" onclick="deleting({{$value->id}})">
                            <button class="btn btn-delete">삭제하기</button>
                        </td>
                        <td>
                            <b onclick="location.href='{{ url('admin/notice/'.$value->id.'/edit') }}'">수정하기</b>
                        </td>
                    </tr>
                @empty
                    <td colspan="7">해당 글이 없습니다.</td>
                @endforelse
                </tbody>
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

        function deleting(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/notice/' + id
                }).then(function () {
                    window.location.href = '/admin/notice/';
                })
            }
        }
    </script>
@endsection