@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="userinfopage">
        <h3>회원리스트&&등급 변경</h3>
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
                    <th>회원가입일</th>
                    <th>회원 등급</th>
                    <th>등급 변경</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $value)
                    <tr class="userinfotable">
                        <td>{{$value->name}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->birth}}</td>
                        <td>{{$value->gender}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>
                            @if($value->grade=='user')
                              일반회원
                                @elseif($value->grade=='premium')
                                프리미엄
                                @else
                                미등록
                                @endif
                            </td>
                        <td>
                            <form id="user_grade_control" action="{{url('admin/user_grade_control')}}" method="POST">
                                {!! csrf_field() !!}
                                <select id="grade" name="grade">
                                    <option style="background-color:#d3d3d3;" selected disabled>--등급 선택--</option>
                                    <option value="user">일반회원</option>
                                    <option value="premium">프리미엄</option>
                                </select>
                                <input type="hidden" name="id" value="{{$value->id}}">
                                <button type="submit">변경</button>
                                <div></div>
                            </form>
                        </td>
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
