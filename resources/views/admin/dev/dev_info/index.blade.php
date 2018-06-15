@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .btn {
            border: 1px solid lightgrey;
            color: grey;
            font-weight: 800;
            padding: 0.8vw 1.5vw;
            border-radius: 1vw;
            -webkit-border-radius: 1vw;
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
                </tr>
                </thead>
                <tbody>
                @forelse($dev as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{ url('admin/dev/'.$value->dev_id.'/edit') }}'">
                        <td class="td1"><img src="/{{  $value->dev_thumbnails }}"></td>
                        <td>{{$value->dev_title}}</td>
                        <td class="td1">
                            <span>{{ $value->dev_city }}</span>
                            <span>{{ $value->dev_district }}</span>
                        </td>
                        <td class="td1">{{ $value->dev_area_size }}</td>
                        <td class="td1">{{ $value->dev_charge }}</td>
                        <td class="td1">{{ $value->dev_method }}</td>
                    </tr>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
