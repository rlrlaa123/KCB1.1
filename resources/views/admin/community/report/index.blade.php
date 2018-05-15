@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="reportpage">
        <h3>신고하기</h3>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id">번호</th>
                    <th class="th2 table_dash_id">작성자</th>
                    <th class="th1 table_title">제목</th>
                    <th class="th2 table_date">날짜</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('/admin/report/'.$value->report_id)}}'">
                        <td class="td1">{{$value->report_id}}</td>
                        <td class="td2">{{$value->report_user}}</td>
                        <td>{{$value->report_title}}</td>
                        <td class="td1">{{$value->report_date}}</td>
                    </tr>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
                @endforelse
                </tbody>
            </table>
            @if($data->count())
                <div class="text-center">
                    {!! $data->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
