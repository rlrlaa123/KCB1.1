@extends('layouts.app')
@include('detailedpage.detailed_style')
<style>
    .basic_info_div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 8vh 0vw;
    }

    .basic_info_div table td {
        border-collapse: collapse;
        border: 1px solid lightgrey;
        padding: 1vw;
        font-size: 1vw;
        text-align: left;
    }

    .basic_info_div table td > p {
        margin: 0;
    }

    .contentname {
        font-weight: 700;
        color: black;
        background-color: #fcefec;
    }

    .initiated_log {
        display: -ms-grid;
        display: grid;
        grid-column-gap: 0;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr;
        grid-template-columns: 15% 70% 15%;
        padding: 10px;
        text-align: center;
        font-size: 1vw;
        border-top: 1px solid darkgrey;
        border-bottom: 1px solid darkgrey;
        min-height: 100px;
        max-height: 200px;
        overflow-y: auto;
        margin: 3vh 0;
    }

    .grid-item:nth-child(2) {
        -ms-grid-column: 3;
    }

    .grid-item:nth-child(3) {
        -ms-grid-column: 5;
    }

    .dev_content {
        margin: 8vh 0;
    }

</style>
@section('content')
    <div class="content">
        <div style="display:flex; justify-content: space-between; align-items: center">
            <b style="font-size: 1.5vw;">{{$data->dev_title}}</b>
            <a style="font-size: 1.2vw; font-weight:lighter; text-decoration: none; color:black;"
               href="{{url('dev_info/'.$next)}}"><b>다음 > </b></a>
        </div>
        <hr/>
        <div class="basic_info_div">
            <div style="width:35%; margin:1vw;"><img src="/{{ $data->dev_fileimage }}" style="width: 100%;">
            </div>
            <div style="width: 65%;">
                <table>
                    <tbody>
                    <tr>
                        <td class="contentname" style=" border-top: 1.5px solid darkgrey;">위치</td>
                        <td style=" border-top: 1.5px solid darkgrey;">
                            <p>{{$data->dev_city}} {{$data->dev_district}}</p></td>
                    </tr>
                    <tr>
                        <td class="contentname">면적</td>
                        <td>{{$data->dev_area_size}}</td>
                    </tr>
                    <tr>
                        <td class="contentname">주체</td>
                        <td>{{$data->dev_charge}}</td>
                    </tr>
                    <tr>
                        <td class="contentname">적용법률</td>
                        <td>{{$data->dev_applied_law}}</td>
                    </tr>
                    <tr>
                        <td class="contentname">사업방식</td>
                        <td>{{$data->dev_method}}</td>
                    </tr>
                    <tr>
                        <td class="contentname" style=" border-bottom: 1.5px solid darkgrey;">사업인정고시일</td>
                        <td style=" border-bottom: 1.5px solid darkgrey;">{{$data->dev_publicly_starting_date}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dev_content">
            <b style="font-size:1.5vw; color:black;">추진내역</b>
            <div class="initiated_log">
                <div class="grid-item" style="background-color:#f6f7fb;">
                    {{$data->dev_initiated_date}}
                </div>
                <div class="grid-item">
                    {{$data->dev_initiated_log}}
                </div>
                <div class="grid-item" style="background-color:#f6f7fb;">
                    자료보기
                </div>
            </div>
        </div>
        <div class="dev_content">
            <b style="font-size:1.5vw; color:black;">향후 추진 계획</b>
            <div class="initiated_log">
                <div class="grid-item">
                    {{$data->dev_initiated_date}}
                </div>
                <div class="grid-item">
                    {{$data->dev_future_plan}}
                </div>
                <div>

                </div>
            </div>
        </div>
        <div class="dev_content">
            <b style="font-size:1.5vw; color:black;">COMMENT</b>
            <hr/>
            <div>
                <p>{{$data->dev_comment}}</p>
            </div>
        </div>
        <div class="dev_content">
            <b style="font-size:1.5vw; color:black;">참고자료</b>
            <hr/>
            <div>
                <a href="{{url('development_reference_filedownload/'.$data->dev_id)}}">파일 다운로드</a>
            </div>
        </div>
    </div>


@endsection