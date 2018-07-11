@extends('layouts.app')
<style>
    body {
        width: 100%;
        height: 100%;
    }

    .body {
        padding: 1vw 15vw 1vw 15vw;
    }
    .Fee_desc{
        margin:4vh 1vw 4vh 1vw;
    }

    .Fee_desc ul{
        text-align: left;
        justify-content: left;
    }
    .Fee_desc li {
        display: block;
        margin: 1vw;
        font-size: 0.9vw;
        font-weight: 600;
        text-align: left;
        color:dimgrey;
    }

    .Fee_table {
        width: 100%;
        height: 100px;
        min-height: 60%;

    }

    .Fee_table table {
        width: 100%;
        justify-content: center;
        text-align: center;
        font-weight:700;
        height:100px;

    }

    .Fee_table td {
        font-size: 1vw;
        border: 1px solid lightgrey;
        border-collapse: collapse;
        text-align: center;
        padding: 2vh 0.7vw;
    }
    .Fee_table thead{
        background-color: #fae1da;
    }

</style>
@section('content')
    <div class="body">
        <h3 style="font-size:1.1vw; font-weight:700;">유료회원 요금 안내</h3>
        <hr/>
        <h4 style="font-size:1vw; font-weight:600;">입금 계좌 정보</h4>
        <div>
            <ul class="Fee_desc">
                <li>
                    한국보상원의 개별정보를 이용하기 위해서는 회원가입 및 유료결제를 하셔야 합니다.
                </li>
                <li>
                    이용요금은 6개월 단위로 요금제를 적용합니다.
                </li>
                <li>
                    결제하신 모든 내역은 마이페이지 > 나의 결제내역에서 확인이 가능합니다.
                </li>
            </ul>
        </div>
        <div class="Fee_table">
            <table>
                <thead>
                <tr>
                    <td>
                        구분
                    </td>
                    <td>
                        6개월
                    </td>
                    <td>
                        12개월
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        정보이용 회원
                    </td>
                    <td>
                        660,000원
                    </td>
                    <td>
                        1,100,000원
                    </td>
                </tr>
                </tbody>
            </table>
            <div>
                <p style="text-align: right; font-size: 0.8vw; padding:1vw; margin:1vw;">
                    상기 요금은 부가가치세가 포함된 금액입니다.<br>
                    본 서비스 한국부동산자산관리연구원에서 운영대행하고 있습니다.<br>
                    <strong>한국부동산자산관리연구원 [사업자 등록 번호: 114-87-03307]</strong>
                </p>
                <p style="text-align:left; font-size:1vw; padding:1vw; mrgin:1vw;">
                    <strong style="font-size:1vw;">입금계좌 정보: 국민은행 476137-01-017787, 예금주 ㈜한국부동산자산관리연구원</strong><br>
                    계좌이체의 경우는 이체 후 <b>master@ream.re.kr</b>로 [한국보상원 유료결제]제목으로 내용 보내주시면 빠르게 처리해 드립니다.
                </p>
            </div>
        </div>
    </div>

@endsection