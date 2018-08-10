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
        <h3>개발사업정보 검색</h3>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id"></th>
                    <th class="th2 table_dash_id">사업명</th>
                    <th class="th1 table_title">지역</th>
                    <th class="th2 table_date">면적</th>
                    <th class="th2 table_date">주체</th>
                    <th class="th2 table_date">방식</th>
                    <th class="th2"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($dev as $value)
                    <tr class="tothedetailpage"
                        onclick="location.href='{{ url('admin/dev/'.$value->id.'/edit') }}'">
                        <td class="td1" style="width:10%;">
                            @if($value->dev_fileimage!=null)
                                <img src="/{{  $value->dev_fileimage }}" style="width:100%;">
                            @else
                                <img src="/img/no_image.jpg">
                            @endif
                        </td>
                        <td>{{$value->dev_title}}</td>
                        <td class="td1">
                            <span>{{ $value->dev_city }}</span>
                            <span>{{ $value->dev_district }}</span>
                        </td>
                        <td class="td1">{{ $value->dev_area_size }}</td>
                        <td class="td1">{{ $value->dev_charge }}</td>
                        <td class="td1">{{ $value->dev_method }}</td>
                        <td class="td1" onclick="deleteDev({{ $value->id }})">
                            <button class="btn btn-delete">삭제하기</button>
                        </td>
                    </tr>
                @empty
                    <td colspan="7">해당 글이 없습니다.</td>
                @endforelse
                </tbody>
            </table>
            @if($dev->count())
                <div class="text-center">
                    {!! $dev->render() !!}
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

        function deleteDev(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/dev/' + id
                }).then(function () {
                    window.location.href = '/admin/dev/';
                })
            }
        }
    </script>
@endsection