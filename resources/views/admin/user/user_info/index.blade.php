@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="userinfopage">
        <h3 style="margin: 0;">회원리스트&등급 변경</h3>
        <div style="text-align: right;">
            <form action="{{url('admin/search_user')}}" method="POST">
                {!! csrf_field() !!}
                <input name="search_user" class="search_user" type="text">
                <button type="submit">회원 검색</button>
            </form>
        </div>
        @forelse($result as $value)
            <h4>회원 검색 결과</h4>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>이메일</th>
                    <th>생년월일</th>
                    <th>성별</th>
                    <th>전화번호</th>
                    <th>회원가입일</th>
                    <th>회원등급</th>
                    <th>등급 변경</th>
                </tr>
                </thead>
                <tbody>
                <tr class="userinfotable">
                    <td>{{$value->name}}</td>
                    <td>{{$value->username}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->birth}}</td>
                    <td>{{$value->gender}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        @if($value->grade=='6premium')
                            6개월 프리미엄
                        @elseif($value->grade=='12premium')
                            12개월 프리미엄
                        @else
                            일반회원
                        @endif
                    </td>
                    <td>
                        <form id="user_grade_control" action="{{url('admin/user_grade_control')}}"
                              method="POST">
                            {!! csrf_field() !!}
                            <select id="grade" name="grade">
                                <option value="user">일반회원</option>
                                <option value="6premium">프리미엄(6개월)</option>
                                <option value="12premium">프리미엄(12개월)</option>
                            </select>

                            <input type="hidden" name="id" value="{{$value->id}}">
                            <button type="submit">변경</button>
                        </form>
                        <div style="justify-content: space-between; display:flex; align-items: center; margin:0; padding:0;">
                            <div style="font-size: 0.7vw; font-weight:lighter">프리미엄 변경 날짜:</div>
                            <div style="font-size: 0.7vw; font-weight:700;">
                                @if($value->grade_updated_at!=null)
                                    {{$value->grade_updated_at}}
                                @else
                                    변경사항 없음.
                                @endif
                            </div>
                        </div>
                        <div style="justify-content: space-between; display:flex; align-items: center; margin:0; padding:0;">
                            <div style="font-size: 0.7vw; font-weight:lighter">프리미엄 만료일:</div>
                            <div style="font-size: 0.7vw; font-weight:700;">
                                @if($value->grade_updated_at!=null)
                                    {{$value->grade_expiration_date}}
                                @else
                                    없음.
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        @empty
            <div style="border: 1px solid;">검색 결과가 없습니다.</div>
        @endforelse
        <hr style=""/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>이메일</th>
                    <th>생년월일</th>
                    <th>성별</th>
                    <th>전화번호</th>
                    <th>회원가입일</th>
                    <th>회원등급</th>
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
                            @if($value->grade=='6premium')
                                6개월 프리미엄
                            @elseif($value->grade=='12premium')
                                12개월 프리미엄
                            @else
                                일반회원
                            @endif
                        </td>
                        <td>
                            <form id="user_grade_control" action="{{url('admin/user_grade_control')}}"
                                  method="POST">
                                {!! csrf_field() !!}
                                <select id="grade" name="grade">
                                    <option value="user">일반회원</option>
                                    <option value="6premium">프리미엄(6개월)</option>
                                    <option value="12premium">프리미엄(12개월)</option>
                                </select>
                                <input type="hidden" name="id" value="{{$value->id}}">
                                <button type="submit">변경</button>
                            </form>
                            <div style="justify-content: space-between; display:flex; align-items: center; margin:0; padding:0;">
                                <div style="font-size: 0.7vw; font-weight:lighter">프리미엄 변경 날짜:</div>
                                <div style="font-size: 0.7vw; font-weight:700;">
                                    @if($value->grade_updated_at!=null)
                                        {{$value->grade_updated_at}}
                                    @else
                                        변경사항 없음.
                                    @endif
                                </div>
                            </div>
                            <div style="justify-content: space-between; display:flex; align-items: center; margin:0; padding:0;">
                                <div style="font-size: 0.7vw; font-weight:lighter">프리미엄 만료일:</div>
                                <div style="font-size: 0.7vw; font-weight:700;">
                                    @if($value->grade_updated_at!=null)
                                        {{$value->grade_expiration_date}}
                                    @else
                                        없음.
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="9">회원 리스트에 등록된 회원이 없습니다.</td>
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
