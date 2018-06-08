@extends('layouts.app')
<style>
    .content{
        margin:1vw 15vw 1vw 15vw;

    }
    .consulting p {
        text-align: center;
        font-size: 1vw;
        padding: 1vw;
        font-weight: lighter;
    }
    .consulting_data{
        display:inline-block;
        cursor:pointer;
        text-align: center;
        font-size:1vw;
        font-weight:700;
        color:black;
        padding:1vw;
        width:50%;
    }
</style>
@section('content')
    <div class="content">
        <h3>
            보상 용역 대행 컨설팅
        </h3>
        <hr/>
        <p style="padding:1vw; line-height:2.5vw;">
            한국보상원은 자신 있는 업무만을 의뢰 받으며, 의뢰 받은 업무의 성과를 위해 사력을 다해 노력하고 있습니다.
            고객의 입장이 언제나 최우선으로 배려될 수 있도록 최선을 다하겠습니다.
            개발사업의 가장 중요한 핵심은 사업이윤의 최대 창출입니다. 사업지 조사에서 사업수지분석, 대관업무 및 관리에 이르기까지 광범위한 사업영역을 전문지식으로 무장된 한국부상원과 함께 하시면 성공적인
            사업결과를 이루실 수 있습니다.
            고객 맞춤형 컨설팅을 제공합니다. 언제든지 궁금하신 점에 대해 문의하시면 성심성의껏 답변드리겠습니다.
        </p>
        <p>
            한국보상원이 제안 드리는 고객 맞춤형컨설팅 제안서 <b style="font-weight:800;">다운로드 받기:</b>
        </p>
        <div style="display:flex; justify-content:space-between; text-align:center; border:1px solid black; align-content: center; ">
            @forelse($data as $value)
                <div class="consulting_data" onclick="location.href='{{url('consulting_filedownload/'.$value->consulting_id)}}'">
                    {{$value->consulting_title}}
                </div>
                @empty
                <div style="text-align:center;">입력된 내용이 없습니다.</div>
                @endforelse
        </div>
    </div>
@endsection