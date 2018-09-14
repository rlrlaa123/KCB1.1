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
        <div style="display:flex; justify-content: space-between; align-items: center;"><h3>공고 고시 목록</h3>
            <div style="cursor:pointer; border:2px solid #e85254; background-color: #e85254; color:white; padding:0.5vw; font-size:1vw; -webkit-border-radius: 1vw;-moz-border-radius: 1vw;border-radius: 1vw;"
                 onclick="location.href='{{url('/admin/notice/create')}}'">공고 고시 추가
            </div>
        </div>

        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id">번호</th>
                    <th class="th1 table_title">제목</th>
                    <th class="th1 classification">분류</th>
                    <th class="th1 classification">지역</th>
                    <th class="th2 table_created_at">공고 고시 생성일</th>
                    <th class="th2"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{ url('admin/notice/'.$value->id.'/edit') }}'">
                        <td class="td1">{{$value->id}}</td>
                        <td class="td1">{{$value->notice_title}}</td>
                        <td class="td1">
                            @if($value->classification=='all')
                                전체 보상
                            @else
                                TODAY 보상
                            @endif</td>
                        <td class="td1">{{$value->location}}</td>
                        <td class="td1">{{ $value->created_at }}</td>
                        <td class="td1" onclick="deleting({{$value->id}})">
                            <button class="btn btn-delete">삭제하기</button>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">해당 글이 없습니다.</td>
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