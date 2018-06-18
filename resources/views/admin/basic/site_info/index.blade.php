@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="askingpage">
        <h3>관리자 목록</h3>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th1 table_id">번호</th>
                    <th class="th1 table_name">관리자 이름</th>
                    <th class="th2 table_dash_id">관리자 아이디</th>
                    <th class="th2 table_grade">관리자 등급</th>
                    <th class="th2 table_password">비밀번호 변경</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="tothedetailpage">
                        <td class="td1">{{$value->id}}</td>
                        <td class="td2">{{$value->name}}</td>
                        <td>{{$value->username}}</td>
                        <td class="td1">{{$value->grade}}</td>
                        <td class="td1"><button style="background-color: #e85254; border-radius:0.5vw; border:#e85254; color:white;font-size:1vw; cursor:pointer;" onclick="location.href='{{url('/admin/resetPassword/'.$value->id)}}'">비밀번호 변경</button></td>
                    </tr>
                @empty
                    <td colspan="5">관리자 계정이 없습니다.</td>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
