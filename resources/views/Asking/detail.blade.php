@extends('layouts.app')
@include('detailedpage.detailed_style')
@section('content')
    <style>
        .asking_detailedtable div {
            text-align: left;
            padding: 0.8vw 2vw;
            font-size: 1vw;
        }

        .table_footer b {
            border: 1px solid lightgrey;
            color: grey;
            font-weight: 800;
            padding: 0.8vw 1.5vw;
            border-radius: 1vw;
            -webkit-border-radius: 1vw;
            -moz-border-radius: 1vw
        }

        .table_footer b:hover {
            text-decoration: none;
            color: grey;
        }

        .table_footer span > b {
            padding: 0.7vw;
            -webkit-border-radius: 0.5vw;
            -moz-border-radius: 0.5vw;
            border-radius: 0.5vw;
        }
    </style>
    <div class="content">
        <h4>
            상담하기 상세
        </h4>
        <div>@include('layouts.partials.communitylist')</div>
        <div>
            <div class="content_title"><strong>{{$data->asking_title}}</strong><span>작성일 : {{$data->asking_date}}</span>
            </div>
            <table class="asking_detailedtable">
                @if($data->asking_file != null)
                    <tr>
                        <td>
                            <div class="writer_and_filedownload">작성자 : {{$data->asking_user}} <span>
                                <a href="{{url('asking_filedownload/'.$data->id)}}">파일 다운로드 Date:{{$data->asking_date}}</a></span>
                            </div>
                        </td>
                    </tr>
                @else
                @endif
                <tr>
                    <td>
                        <table class="asking_detailed_table_content">
                            <tr>
                                <td>
                                    <div>
                                        <p>{{$data->asking_content}}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="text-align: right;">
                                        {{--<span><b onclick="passwordpopup([{{$previous->asking_password}},{{$previous->id}}])">이전글</b>--}}
                                        {{--<b onclick="passwordpopup([{{$next->asking_password}},{{$next->id}}])">다음글</b>--}}
                                        {{--</span>--}}
                                        <b onclick="location.href='{{url('/asking/')}}'">목록</b>
                                    </div>
                                </td>
                            </tr>
                            @if($data->image != null)
                                <tr>
                                    <td>
                                        <img src="/{{$data->image}}" style="width:80%;">
                                    </td>
                                </tr>
                            @else
                            @endif
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            @if($data->admin_comment != null)
                <div style="text-align: right;">
                    <textarea cols="80" name="admin_comment" rows="5"
                              style="background: transparent; font-size: 1vw; font-weight: 600; color: black;
                               overflow-y: scroll; width:70vw; border:1px solid transparent;" disabled>
                        {{$data->admin_comment}}
                    </textarea>
                </div>
            @else
            @endif
        </div>
    </div>
    {{--<script>--}}
    {{--function passwordpopup(real_password, id) {--}}
    {{--var role = "{{ Illuminate\Support\Facades\Auth::user()->checkPremium(Illuminate\Support\Facades\Auth::user()->grade) }}";--}}
    {{--if (role === "1") {--}}
    {{--var password = prompt("비밀번호를 입력하세요.");--}}
    {{--if (password === real_password) {--}}
    {{--location.href = "/asking/" + id;--}}
    {{--} else {--}}
    {{--alert("비밀번호를 정확히 입력해주세요.");--}}
    {{--}--}}
    {{--}--}}
    {{--else {--}}
    {{--alert('프리미엄 회원만 열람이 가능합니다.');--}}
    {{--}--}}
    {{--}--}}
    {{--</script>--}}
@endsection