@extends('layouts.app')
@section('content')
    <style>
        .wrapper {
            margin: 1vw 15vw 1vw 15vw;
        }
        .myinfo {
            display: grid;
            grid-template-columns: 20% 80%;
            border-top: 2px solid #a3a3a3;
            border-bottom: 1px solid #e3e3e3;
            border-right: 1px solid #e3e3e3;
            border-left: 1px solid #e3e3e3;
        }

        .myinfo div {
            border-bottom: 1px solid #e3e3e3;
            border-right: 1px solid #e3e3e3;
            padding: 5px 20px;
            font-family: sans-serif;
        }

        .header {
            background-color: #fdf7f5;
            font-size:0.9vw;
            font-weight:600;
        }

        .content {
            font-weight: 600;
            font-size:0.9vw;
        }
    </style>
    <div class="wrapper">
        <h3 style=" color:#696969; font-size:1.1vw; font-weight:700;">
            나의 정보
        </h3>
        <hr>
        <div class="myinfo">
            <div class="header">이름</div>
            <div class="content">{{ $data->name }}</div>
            <div class="header">아이디</div>
            <div class="content">{{ $data->username }}</div>
            <div class="header">이메일</div>
            <div class="content">{{ $data->email }}</div>
            <div class="header">휴대폰 번호</div>
            <div class="content">{{ $data->phone }}</div>
            <div class="header">아이디 생성일</div>
            <div class="content">{{ $data->created_at }}</div>
            <div class="header">생년월일</div>
            <div class="content">{{ $data->birth }}</div>
            <div class="header">등급</div>
            <div class="content">
                @if($data->grade=='6premium')
                    6개월 프리미엄
                @elseif($data->grade=='12premium')
                    12개월 프리미엄
                @else
                    일반회원
                @endif
            </div>
            <div class="header">프리미엄 등록일</div>
            <div class="content">
                @if($data->grade_updated_at!=null)
                    {{$data->grade_updated_at}}
                @else
                    변경사항 없음.
                @endif
            </div>
            <div class="header">프리미엄 만료일</div>
            <div class="content">
                @if($data->grade_updated_at!=null)
                    {{$data->grade_expiration_date}}
                @else
                    없음.
                @endif
            </div>
        </div>
    </div>
@endsection