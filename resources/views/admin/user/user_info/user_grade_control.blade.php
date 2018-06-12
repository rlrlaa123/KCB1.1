@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="userinfopage">
        <h3>회원리스트</h3>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>이메일</th>
                    <th>생년월일</th>
                    <th>성별</th>
                    <th>휴대전화 번호</th>
                    <th>회원 등급</th>
                    <th>회원가입일</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage">
                        <td>{{$value->name}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->birth}}</td>
                        <td>{{$value->gender}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->grade}}
                        <td>{{$value->created_at}}</td>
                    </tr>
                @empty
                    <td colspan="7">회원 리스트에 등록된 회원이 없습니다.</td>
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
