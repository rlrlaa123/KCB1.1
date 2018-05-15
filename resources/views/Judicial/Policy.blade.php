@extends('layouts.app')
<style>
    .Policypage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .Policypage th, td {
        text-align: center;
        border: solid 1px transparent;
    }

</style>
@section('content')
    <div class="Policypage">
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
                @forelse($data as $value)
                    <tr class="tothedetailpage" onclick="location.href='{{url('policy/'.$value->p_id)}}'">
                        <td class="td1 ">{{$value->p_id}}</td>
                        <td class="td2">규정/지침</td>
                        <td>{{$value->p_title}}</td>
                        <td class="td1">{{$value->p_date}}</td>
                    </tr>
                @empty
                    <td colspan="4">해당 글이 없습니다.</td>
                @endforelse
            </table>
            @if($data->count())
                <div class="text-center">
                    {!! $data->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection