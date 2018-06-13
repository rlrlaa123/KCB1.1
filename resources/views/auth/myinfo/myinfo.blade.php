@extends('layouts.app')
@section('content')
    <style>
        .myinfo {
            margin: 1vw 15vw 1vw 15vw;
        }

        .myinfo > table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;

        }

        .myinfo > table td {
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 1.3vw;
            padding: 0.5vw;
        }
    </style>
    <div class="myinfo">
        <h3>
            나의 정보
        </h3>
        <table>
            <tr>
                <td>이름</td>
                <td>{{$data->name}}</td>
                <td>아이디</td>
                <td>{{$data->username}}</td>
            </tr>
            <tr>
                <td>이메일</td>
                <td>{{$data->email}}</td>
                <td>이름</td>
                <td>{{$data->phone}}</td>
            </tr>
            <tr>
                <td>아이디 생성일</td>
                <td>{{$data->created_at}}</td>
                <td>생년월일</td>
                <td>{{$data->birth}}</td>
            </tr>
            <tr>
                <td>등급</td>
                <td>
                    @if($data->grade=='6premium')
                        6개월 프리미엄
                    @elseif($data->grade=='12premium')
                        12개월 프리미엄
                    @else
                        일반회원
                    @endif
                </td>

                <td>프리미엄 등록일
                </td>
                <td>
                    <div style="font-size: 0.7vw; font-weight:700;">
                        @if($data->grade_updated_at!=null)
                            {{$data->grade_updated_at}}
                        @else
                            변경사항 없음.
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">프리미엄 만료일</td>
                <td colspan="2">
                    <div style="font-size: 0.7vw; font-weight:700;">
                        @if($data->grade_updated_at!=null)
                            {{$data->grade_expiration_date}}
                        @else
                            없음.
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

@endsection