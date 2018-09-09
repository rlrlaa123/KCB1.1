@extends('layouts.app')
@section('content')
    <div class="introbody">
        <div>@include('layouts.partials.companyintro_list')
        </div>
        <hr/>
        <div>
            <h3 style="font-size: 1.5vw; font-weight: 700; color: black; text-align: left; margin: 4vh 0;">회사소개 및 대표
                인사말</h3>
            <div class="intro_content">
                <img src="/img/intro.jpg" class="grid-item" style="width: 100%;">
                <div class="grid-item" style="width:100%;">
                    <div style="font-size:1.3vw; color:#7491bd; text-align:left; padding-top: 1vw;">새로운 창조를 위한 변화와
                        도전<br>
                        <b style="font-weight:600; color:black;">Change and challenge for new creation</b></div>
                    <div class="intro_desc">
                        <p>공익사업의 수행은 국민의 재산권 보호와 더불어 공공의 이익을 위한 공적 사업의 적기수행이라는 다소 양립하기 어려운 두 가지 목적을 동시에 달성해야 하는 중차대한
                            문제이기에 명확한 행정 절차적 손실보상 업무의 규정에 대한 확립, 보상 행정판례와 질의회신에 대한 행정규칙 및 관계 법령에 규정된 절차와 원칙에 따라 공정하고
                            정당하게 수행되어야 합니다.
                        </p>
                        <p>특히 손실보상 행정업무는 고도의 전문화된 공적 업무일 뿐만 아니라 공익과 사익을 조절하여 공공의 이익과 발전을 위한 공공사업의 추진 방향과 기준을 제시하여야 하므로,
                            대한민국과 같이 고도의 성장을 위해 국민의 기본권인 사유재산권에 대한 특별한 희생과 의무를 부여한 손실보상 법제의 체계는 손실보상 실무 현장에서 대립과 분쟁의 소지를
                            남기고 있다고 할 수 있습니다.</p>
                        <p>그러나 이러한 공익사업의 시행이 국토의 개발과 국가의 발전에 크게 이바지하여 온 것 또한 사실입니다. 이에 공익사업의 수행과 관련된 정보들을 활용하여 삶의 터전을
                            만들고, 나아가 발전된 도시의 미래를 확인하고 공익사업으로 인해 변형될 도시의 가치를 미리 판단하여 선점해 나아갈 수 있다면 이 시대를 살아가는 현명한 해안을 가질
                            수 있으리라 확신합니다.</p>
                        <p>여기에 착안하여 국가 또는 의제 공익사업의 시행과 계획에 관한 모든 정보를 누구나 쉽게 살펴볼 수 있도록 구성하여 국민 누구에게나 평등한 투자의 기회와 공익사업으로
                            인해 발생될 피해를 미리 감지하고 대비해 나갈 수 있는 공익사업 정보열람 사이트를 개설하게 되었습니다.</p>
                        <p>우리 한국보상원은 보다 전문적이며 작은 문제에도 항상 탐구하며 고객의 입장에서 진정성과 열정을 품고 매사에 준비하며 노력하는 자세로 고객과 함께 최선의 가치를 위해 쉼
                            없이 성장해 나아가는 한국보상원이 될 것을 다짐합니다.</p>
                        <div style="margin-top:20px; text-align:right;">
                            <span class="CeoName">대표이사 윤경식</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection