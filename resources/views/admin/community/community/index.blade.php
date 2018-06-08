@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="askingpage">
        <h3>전체게시판</h3>
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
                    <tr class="tothedetailpage" onclick="location.href='{{url('/admin/community/'.$value->id)}}'">
                        <td class="td1">{{$value->id}}</td>
                        <td class="td2">{{$value->user->name}}</td>
                        <td>{{$value->title}}</td>
                        <td class="td1">{{$value->created_at}}</td>
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
