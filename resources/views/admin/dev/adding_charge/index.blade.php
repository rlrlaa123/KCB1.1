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
        <div style="display:flex; justify-content: space-between; align-items: center;"><h3>주체 목록</h3>
            <div style="cursor:pointer; border:2px solid #e85254; background-color: #e85254; color:white; padding:0.5vw; font-size:1vw; -webkit-border-radius: 1vw;-moz-border-radius: 1vw;border-radius: 1vw;"
                 onclick="location.href='{{url('/admin/adding_charge/create')}}'">주체 추가
            </div>
        </div>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 column_id">주체 번호</th>
                    <th class="th2 column_name">주체 이름</th>
                    <th class="th2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($charge as $value)
                    <tr class="tothedetailpage"
                        onclick="location.href='{{ url('/admin/adding_charge/'.$value->search_charge_id.'/edit') }}'">
                        <td>{{$value->search_charge_id}}</td>
                        <td class="td1">{{ $value->search_charge }}</td>
                        <td class="td1" onclick="deleteCharge({{ $value->search_charge_id }})">
                            <button class="btn btn-delete">삭제하기</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($charge->count())
                <div class="text-center">
                    {!! $charge->render() !!}
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

        function deleteCharge(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/adding_charge/' + id
                }).then(function () {
                    window.location.href = '/admin/adding_charge/';
                })
            }
        }
    </script>
@endsection