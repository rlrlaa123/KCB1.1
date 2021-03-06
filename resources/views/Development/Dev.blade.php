@extends('layouts.app')
<style>
    @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
        .padding_control{
            padding:25% 0;
        }
    }
    @supports (-ms-accelerator:true) {
        .padding_control{
            padding:25% 0;
        }
    }
    @media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {
        .padding_control{
            padding:25% 0;
        }
    }

    .dev_page > hr {
        display: block;
        visibility: visible;
        width: 100%;
        height: 1.5vh !important;
        font-size: 0;
        line-height: 0;
    }

    .dev_page {
        width: 100%;
        padding: 1vw 15vw 1vw 15vw;
    }

    .result_container h3 {
        display: inline;
        font-size: 1.1vw;
        margin: 1vw;
        font-weight: 700;
        color: #636b6f;
    }

    .ClearBtn {
        position: relative;
        color: #FFFFFF;
        background-color: #546eb4;
        padding: 0.2vw 0.4vw;
        font-size: 1vw;
        text-align: center;
        align-items: center;
        font-weight: bolder;
        border: none;
        border-radius: 0.4vw;
        float: right;
        margin: 2vw 1vw 1vw 1vw;
        cursor: pointer;
    }

    .dev_info_search {
        padding: 0;
        text-align: center;
        width: 100%;
        max-width: 100%;
        margin: 0;
        height: 65vh;
    }

    .grid-item1:nth-child(2) {
        margin: 0;
        -ms-grid-column: 3;

    }

    .grid-item1:nth-child(3) {
        margin: 0;
        -ms-grid-column: 5;

    }

    .grid-item1:nth-child(5) {
        margin: 0;
        -ms-grid-column: 7;

    }

    .grid-item:nth-child(2) {
        margin: 0;
        -ms-grid-column: 3;

    }

    .grid-item:nth-child(3) {
        margin: 0;
        -ms-grid-column: 5;

    }

    .grid-item:nth-child(5) {
        margin: 0;
        -ms-grid-column: 7;

    }

    .grid-item:nth-child(7) {
        margin: 0;
        -ms-grid-column: 9;

    }

    .grid-item:nth-child(9) {
        margin: 0;
        -ms-grid-column: 11;

    }

    .grid-item:nth-child(11) {
        margin: 0;
        -ms-grid-column: 13;

    }

    .displaying_content {
        display: grid;
        display: -ms-grid;
        grid-template-columns: 60% 40%;
        -ms-grid-columns: 6fr 0px 4fr;
        height: 90%;
    }

    .search_classes {
        width: 100%;
        padding: 0;
        margin: 0;
    }

    .class_title {
        display: grid;
        display: -ms-grid;
        grid-template-columns: 10% 50% 20% 20%;
        -ms-grid-columns: 1fr 0px 5fr 0px 2fr 0px 2fr;
        height: 10%;
        color: #FFFFFF;
        background-color: #546eb4;
        font-size: 1vw;
        text-align: left;
        align-items: center;
        font-weight: bolder;
    }

    .location_children {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1vw 1fr;
        grid-template-columns: 50% 50%;
        text-align: center;
        align-items: center;
        font-weight: bold;
        font-size: 1.3vw;
        padding: 0.3vw;
        color: #000000;
        width: 100%;
        margin: 0;
    }

    .location_class_child {
        cursor: pointer;
        padding: 0;
        text-align: -moz-center;
        text-align: center;
        max-width: 100%;
        justify-content: center;
        width: 100%;
        margin: 0;
        overflow-y: auto;

    }

    .dev_table_child {
        overflow-y: scroll;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }

    .listed {
        word-break: keep-all;
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        padding: 0.3vw;
        font-size: 1vw;
        cursor: pointer;
        color: dimgrey;
        font-weight: 600;
    }

    @media (max-width: 750px) {
        .listed {
            font-size: 0.5vw;
        }

    }
    @media (max-width: 1440px) {
        .dev_info_search {
            height:52vh!important;
        }

    }
    @media (min-width: 1440px) {
        .dev_info_search {
            height:70vh;
        }

    }
    @media (max-width: 750px) {
        .dev_info_search {
            height:30vh!important;
        }

    }

    .listed2 {
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        padding: 0.3vw;
        font-size: 1.3vw;
        cursor: pointer;
        font-weight: lighter;
    }

    .listed:hover, .active {
        background-color: #e3e3e3;
        text-decoration: none;
    }

    .dev_table_child::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .dev_table_child::-webkit-scrollbar-thumb {
        background-color: lightgrey;
    }

    .dev_table_child::-webkit-scrollbar-button {
        background-color: transparent
    }

    .dev_table_child::-webkit-scrollbar-corner {
        background-color: grey;

    }

    .dev_table_child::-webkit-scrollbar {
        width: 3px !important;
        -ms-overflow-style: auto;
    }

    .result_container {
        padding: 2vw 0 0 0;
        margin-top: 5vh;
    }

    .dev_info_result_title {
        padding: 0;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr 1vw 1fr 1vw 1fr 1vw 1fr;
        grid-template-columns: 20% 20% 15% 12.5% 20% 12.5%;
        text-align: center;
        width: 100%;
        max-width: 100%;
        margin: 1.2vw 0 0 0;
        font-size: 1vw;
        color: dimgrey;
        font-weight: 600;
        border-top: 0.5px solid;
        border-bottom: 0.5px solid;

    }

    .dev_info_result_wrapper {
        width: 100%;
        max-width: 100%;
        margin: 0;
        border-bottom: 0.5px solid;
        height: 300px;
        text-align: center;
        vertical-align: middle;
        overflow: auto;
    }

    .dev_info_result_container {
        display: grid;
        display: -ms-grid;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr 1vw 1fr 1vw 1fr 1vw 1fr;
        grid-template-columns: 20% 20% 15% 12.5% 20% 12.5%;
        cursor: pointer;
        text-align: center;
        font-size: 1vw;
        font-weight: 700;
        padding: 20px;
        justify-content: center;
        align-items: center;
    }

    .dev_info_result {
        padding: 0;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1fr 1fr 1fr 1fr;
        grid-template-columns: 20% 20% 16% 12% 16% 16%;
        text-align: center;
        width: 100%;
        max-width: 100%;
        margin: 0;
        border-top: 0.5px solid;
        border-bottom: 0.5px solid;
    }

    .dev_table_child::-webkit-scrollbar:hover {
        width: 0;
        background: lightgrey;
    }

    .dev_table_child::-webkit-scrollbar-thumb:hover {
        background: lightgrey;
    }

</style>
<script>
    function citylist() {
        document.getElementById('dropdown1-content').style.display = "block";
    }

    function nocitylist() {
        document.getElementById('dropdown1-content').style.display = "none";

    }
</script>
@section('content')
    <div class="dev_page">
        <div style="display:flex; justify-content: space-between; align-items: center">
            <b style="font-size: 1.1vw;">개발사업정보 검색</b><b></b>
        </div>
        <hr/>
        <div>
            <div class="dev_info_search scaleable-wrapper" id="scaleable-wrapper">
                <div class="class_title">
                    <div class="dropdown1 grid-item">
                        <button class="dropbtn1 menu_btn1" type="button">시/도 선택
                        </button>
                        <div class="dropdown1-content">
                            <a href="javascript:FindDistrict(1);" class="on">서울</a>
                            <a href="javascript:FindDistrict(2);" class="">경기도</a>
                            <a href="javascript:FindDistrict(3);" class="">강원도</a>
                            <a href="javascript:FindDistrict(4);" class="">경상남도</a>
                            <a href="javascript:FindDistrict(5);" class="">경상북도</a>
                            <a href="javascript:FindDistrict(6);" class="">광주</a>
                            <a href="javascript:FindDistrict(7);" class="">대구</a>
                            <a href="javascript:FindDistrict(8);" class="">대전</a>
                            <a href="javascript:FindDistrict(9);" class="">부산</a>
                            <a href="javascript:FindDistrict(10);" class="">세종</a>
                            <a href="javascript:FindDistrict(11);" class="">울산</a>
                            <a href="javascript:FindDistrict(12);" class="">인천</a>
                            <a href="javascript:FindDistrict(13);" class="">전라남도</a>
                            <a href="javascript:FindDistrict(14);" class="">전라북도</a>
                            <a href="javascript:FindDistrict(15);" class="">제주도</a>
                            <a href="javascript:FindDistrict(16);" class="">충청남도</a>
                            <a href="javascript:FindDistrict(17);" class="">충청북도</a>
                        </div>
                    </div>
                    <div class="grid-item padding_control" style="text-align: center;"><strong>지역</strong></div>
                    <div class="grid-item padding_control" style="cursor:pointer; text-align:center;"
                         onclick="selectsearch_type('search_type')"><strong>유형</strong>
                    </div>
                    <div class="grid-item padding_control" style="border-left: 0.5px solid white;cursor:pointer; text-align:center;"
                         onclick="selectsearch_type('search_charge')"><strong>주체</strong>
                    </div>
                </div>
                <div>
                    <div class="displaying_content">
                        <div class="location_class_child grid-item" style="border: 1px solid #546eb4;">
                            @include ('Development.testing')
                        </div>
                        <div class="location_class_child grid-item" style="border: 1px solid #546eb4;">
                            <div class="dev_table_child" id="search_type" style="display:block;">
                                @foreach($search_type as $type)
                                    <div class="listed type_switch" onclick="dev_type('{{$type->search_type}}')">
                                        {{$type->search_type}}
                                    </div>
                                @endforeach
                            </div>
                            <div class="dev_table_child" id="search_charge" style="display:none;">
                                @foreach($search_charge as $charge)
                                    <div class="listed charge_switch"
                                         onclick="dev_charge('{{$charge->search_charge}}')">
                                        {{$charge->search_charge}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ClearBtn" onclick="location.href='{{url('/dev_info')}}'">
            조건 초기화
        </div>
        <div class="result_container">
            <h3>개발사업정보 결과</h3>
            <div class="dev_info_result_title">
                <div class="grid-item"></div>
                <div class="grid-item">사업명</div>
                <div class="grid-item">지역</div>
                <div class="grid-item">면적</div>
                <div class="grid-item">주체</div>
                <div class="grid-item">방식</div>
            </div>
            <div class="dev_info_result_wrapper">
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function selectsearch_type(type) {
            var i;
            var x = document.getElementsByClassName('dev_table_child');
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(type).style.display = "block";
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //---------------------------Showing Districts------------------------------------------------------------
        function showDistrictList(loc) {
            var i;
            var x = document.getElementsByClassName('listed2');
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            $.ajax({
                type: "POST",
                url: '/showdistrictlist',
                data: {data: loc}
            }).done(function (district) {
                // console.log(district);
                district.map(function (ele) {
                    document.getElementById(ele['num_id']).style.display = 'block';

                })

                // document.getElementById(district);
            })
                .fail(function (error) {
                    console.error(error);
                });
        }

        //----------------------------Showing Results----------------------------------------------------------
        var dev_data = {
            dev_district: '',
            dev_type: '',
            dev_charge: '',
            dev_city: '',
        };

        function dev_district(dev, dev1) {
            dev_data['dev_city'] = dev;
            dev_data['dev_district'] = dev1;
            Chosen(dev_data);
            console.log(dev_data);
        }

        function dev_type(dev) {
            dev_data['dev_type'] = dev;
            Chosen(dev_data);
            console.log(dev_data);
        }

        function dev_charge(dev) {
            dev_data['dev_charge'] = dev;
            Chosen(dev_data);
            console.log(dev_data);
        }

        function Chosen(data) {
            var i;
            var x = document.getElementsByClassName('dev_info_resulted');
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            $.ajax({
                type: "POST",
                url: '/chosen',
                data: data
            }).done(function (dev_info) {
                console.log(dev_info);
                var data = JSON.parse(dev_info);
                var wrapper = document.getElementsByClassName('dev_info_result_wrapper')[0];
                wrapper.innerHTML = '';

                data.map(function (ele) {
                    var newDiv = document.createElement('div');
                    newDiv.className = 'dev_info_result_container';
                    newDiv.onclick =
                        function () {
                            @if(\Illuminate\Support\Facades\Auth::guest())
                            alert('회원 가입 후에 열람하실 수 있습니다.');
                                    @else
                            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
                            if (role === "1") {
                                window.open("{{url('dev_info')}}" + "/" + ele.id);
                            } else if (role === "0") {
                                alert('프리미엄 회원만 열람이 가능합니다.');
                            }
                            @endif
                        };
                    var newContainer1 = document.createElement('img');
                    newContainer1.src = '/' + ele.dev_thumbnails;
                    newContainer1.classList.add("grid-item");
                    var newContainer2 = document.createElement('div');
                    newContainer2.innerHTML = ele.dev_title;
                    newContainer2.classList.add("grid-item");
                    var newContainer3 = document.createElement('div');
                    newContainer3.innerHTML = ele.dev_city + ' ' + ele.dev_district;
                    newContainer3.classList.add("grid-item");
                    var newContainer4 = document.createElement('div');
                    newContainer4.innerHTML = numberWithCommas(ele.dev_area_size) + ' m<sup>2</sup>';
                    newContainer4.classList.add("grid-item");
                    var newContainer5 = document.createElement('div');
                    newContainer5.innerHTML = ele.dev_charge;
                    newContainer5.classList.add("grid-item");
                    var newContainer6 = document.createElement('div');
                    newContainer6.innerHTML = ele.dev_method;
                    newContainer6.classList.add("grid-item");

                    newDiv.appendChild(newContainer1);
                    newDiv.appendChild(newContainer2);
                    newDiv.appendChild(newContainer3);
                    newDiv.appendChild(newContainer4);
                    newDiv.appendChild(newContainer5);
                    newDiv.appendChild(newContainer6);
                    wrapper.appendChild(newDiv);

                });
            })
                .fail(function (error) {
                    console.error(error);
                });
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        var city = document.getElementsByClassName('city_switch');
        Array.from(city).map(function (ele) {
            ele.addEventListener('click', function () {
                Array.from(city).map(function (ele2) {
                    ele2.className = 'listed city_switch';
                });
                this.className += ' active';
            });
        });

        var type = document.getElementsByClassName('type_switch');
        Array.from(type).map(function (ele) {
            ele.addEventListener('click', function () {
                Array.from(type).map(function (ele2) {
                    ele2.className = 'listed type_switch';
                });
                this.className += ' active';
            })
        });
        var charge = document.getElementsByClassName('charge_switch');
        Array.from(charge).map(function (ele) {
            ele.addEventListener('click', function () {
                Array.from(charge).map(function (ele2) {
                    ele2.className = 'listed charge_switch';
                });
                this.className += ' active';
            })
        });
        var district = document.getElementsByClassName('district_switch');
        Array.from(district).map(function (ele) {
            ele.addEventListener('click', function () {
                Array.from(district).map(function (ele2) {
                    ele2.className = 'listed2 district_switch';
                });
                this.className += ' active';
            })
        });
    </script>
@endsection