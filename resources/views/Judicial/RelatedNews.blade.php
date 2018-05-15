@extends('layouts.app')
<style>
    .RNpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .RNpage th, td {
        text-align: center;
        border: solid 1px transparent;
    }

</style>
@section('content')
    <div class="RNpage">
        @include('layouts.partials.judicialpage_list')
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id">번호</th>
                    <th class="th2 table_dash_id">구분</th>
                    <th class="th1 table_title">제목</th>
                    <th class="th2 table_date">날짜</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('relatednews/'.$value->rn_id)}}'">
                        <td class="td1">{{$value->rn_id}}</td>
                        <td class="td2">관련 뉴스</td>
                        <td>{{$value->rn_title}}</td>
                        <td class="td1">{{$value->rn_date}}</td>
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
