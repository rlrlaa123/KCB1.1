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
        <div style="display:flex; justify-content: space-between; align-items: center;"><h3>관련 뉴스 목록</h3>
            <div style="cursor:pointer; border:2px solid #e85254; background-color: #e85254; color:white; padding:0.5vw; font-size:1vw; -webkit-border-radius: 1vw;-moz-border-radius: 1vw;border-radius: 1vw;"onclick="location.href='{{url('/admin/relatednews/create')}}'">관련 뉴스 추가</div></div>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id" style="width:15%;">번호</th>
                    <th class="th1 table_title" style="width:40%;">제목</th>
                    <th class="th2 table_created_at" style="width:15%;">관련 뉴스 생성일</th>
                    <th class="th2 table_updated_at" style="width:15%;">관련 뉴스 수정일</th>
                    <th class="th2" style="width:15%;"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage"
                        onclick="location.href='{{ url('admin/relatednews/'.$value->rn_id.'/edit') }}'">
                        <td class="td1">{{$value->rn_id}}</td>
                        <td class="td1">{{$value->rn_title}}</td>
                        <td class="td1">{{ $value->created_at }}</td>
                        <td class="td1">{{ $value->rn_date }}</td>
                        <td class="td1" onclick="deleting({{ $value->rn_id }})">
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

        function deleting(rn_id) {
            $('div.rn_id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/relatednews/' + rn_id
                }).then(function () {
                    window.location.href = '/admin/relatednews/';
                })
            }
        }
    </script>
@endsection