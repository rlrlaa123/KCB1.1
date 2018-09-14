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
        <div style="display:flex; justify-content: space-between; align-items: center;"><h3>유형 목록</h3>
            <div style="cursor:pointer; border:2px solid #e85254; background-color: #e85254; color:white; padding:0.5vw; font-size:1vw; -webkit-border-radius: 1vw;-moz-border-radius: 1vw;border-radius: 1vw;"
                 onclick="location.href='{{url('/admin/adding_type/create')}}'">유형 추가
            </div>
        </div>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 column_id">유형 번호</th>
                    <th class="th2 column_name">유형 이름</th>
                    <th class="th2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($type as $value)
                    <tr class="tothedetailpage"
                        onclick="location.href='{{ url('/admin/adding_type/'.$value->search_type_id.'/edit') }}'">
                        <td>{{$value->search_type_id}}</td>
                        <td class="td1">{{ $value->search_type }}</td>
                        <td class="td1" onclick="deleteAdding({{ $value->search_type_id }})">
                            <button class="btn btn-delete">삭제하기</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($type->count())
                <div class="text-center">
                    {!! $type->render() !!}
                </div>
            @endif
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

        function deleteAdding(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/adding_type/' + id
                }).then(function () {
                    window.location.href = '/admin/adding_type/';
                })
            }
        }
    </script>
@endsection