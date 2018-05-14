@extends('layouts.app')
<style>
    .dev_page {
        margin: 1vw 15vw 1vw 15vw;
    }

    .dev_info_search {
        padding: 0;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1fr 1fr;
        grid-template-columns: 33% 33% 33%;
        text-align: center;
        height: 300px;
        width: 100%;
        max-width: 100%;
        margin: 0;
    }

    .grid-item:nth-child(2) {
        margin: 0;
        -ms-grid-column: 3;

    }

    .grid-item:nth-child(3) {
        margin: 0;
        -ms-grid-column: 5;

    }

    .search_classes {
        border: 1px solid #546eb4;
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
    }

    .class_title {
        color: #FFFFFF;
        background-color: #546eb4;
        padding: 0.3vw;
        font-size: 1.4vw;
        text-align: center;
        align-items: center;
        font-weight: bolder;
    }

    .location_children {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1fr;
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
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1fr;
        grid-template-columns: 50% 50%;
        text-align: center;
        max-width: 100%;
        margin: 0;
        overflow-y: auto;

    }

    .location_class_child div {
        width: 100%;
    }

    .dev_table_child {
        height: 235px;
        overflow-y: scroll;
        width: 100%;
        overflow-x: hidden;
    }

    .listed {
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        padding: 0.3vw;
        font-size: 1.3vw;
        cursor:pointer;
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
        background-color: black;
    }

    .dev_table_child::-webkit-scrollbar-button {
        background-color: transparent;
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
    }

    .dev_info_result_title {
        padding: 0;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1fr 1fr 1fr 1fr;
        grid-template-columns: 15% 15% 25% 25% 20%;
        text-align: center;
        width: 100%;
        max-width: 100%;
        margin: 0;
        border-top: 0.5px solid;
        border-bottom: 0.5px solid;

    }

    .dev_info_result_wrapper {
        width: 100%;
        max-width: 100%;
        margin: 0;
        border-bottom: 0.5px solid;
        height:300px;
        text-align:center;
        vertical-align: middle;
        overflow: auto;
    }

    .dev_info_result_container {
        display: grid;
        grid-template-columns: 15% 15% 25% 25% 20%;
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

</style>
@section('content')
    <div class="dev_page">
        <div style="display:flex; justify-content: space-between; align-items: center">
            <b style="font-size: 1.5vw;">개발사업정보 검색</b><b style="font-size: 1.2vw;">상세 검색</b>
        </div>
        <hr/>
        <div class="dev_info_search">
            <div class="search_classes">
                <div class="class_title"><strong>지역</strong></div>
                <div class="location_children">
                    <div>시/도</div>
                    <div>군/구</div>
                </div>
                <div class="location_class_child">
                    <div class="dev_table_child">
                        @foreach($cities as $city)
                            <div class="listed city_switch" onclick="showDistrictList('{{$city->dev_city}}')">
                                {{$city->dev_city}}
                            </div>
                        @endforeach
                    </div>
                    <div class="dev_table_child" id="district">
                        @forelse($location as $loc)
                            <div onclick="dev_district('{{$loc->dev_district}}')" class="listed2 district_switch" id="{{ $loc->num_id }}"
                                 style="display: none;">{{$loc->dev_district}}</div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="search_classes">
                <div class="class_title"><strong>유형</strong></div>
                <div class="dev_table_child">
                    @foreach($search_type as $type)
                        <div class="listed type_switch" onclick="dev_type('{{$type->search_type}}')">
                            {{$type->search_type}}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="search_classes">
                <div class="class_title"><strong>주체</strong></div>
                <div class="dev_table_child">
                    @foreach($search_charge as $charge)
                        <div class="listed charge_switch" onclick="dev_charge('{{$charge->search_charge}}')">
                            {{$charge->search_charge}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="result_container">
            <h3 style="display: inline;">개발사업정보 결과</h3>
            <button style="float: right;" onclick="ClearBtn()">ClearBtn</button>
            <div class="dev_info_result_title">
                <div>사업명</div>
                <div>지역</div>
                <div>면적</div>
                <div>주체</div>
                <div>방식</div>
            </div>
            <div class="dev_info_result_wrapper">
                {{--@forelse($data as $value)--}}
                    {{--<a href="{{url('dev/'.$value->dev_id)}}" class="dev_info_resulted" style="display:none;">--}}
                        {{--<div class="dev_info_result">--}}
                            {{--<div class="dev_thumbnails"><img src="http://127.0.0.1:8000/{{$value->dev_thumbnails}}">--}}
                            {{--</div>--}}
                            {{--<div class="dev_title"></div>--}}
                            {{--<div>--}}
                                {{--<div class="dev_city"></div>--}}
                                {{--<div class="dev_district"></div>--}}
                            {{--</div>--}}
                            {{--<div class="dev_area_size"></div>--}}
                            {{--<div class="dev_charge"></div>--}}
                            {{--<div class="dev_method"></div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--@empty--}}
                    {{--<div style="text-align: center; vertical-align: middle; color:#aaaaaa">검색하신 결과가 없습니다.</div>--}}
                {{--@endforelse--}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
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
            dev_charge: ''
        };

        function dev_district(dev) {
            dev_data['dev_district'] = dev;
            Chosen(dev_data);
        }
        function dev_type(dev) {
            dev_data['dev_type'] = dev;
            Chosen(dev_data);
        }
        function dev_charge(dev) {
            dev_data['dev_charge'] = dev;
            Chosen(dev_data);
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

                data.map(function(ele) {
                    var newDiv = document.createElement('div');
                    newDiv.className = 'dev_info_result_container';

                    var newContainer1 = document.createElement('div');
                    newContainer1.innerHTML = ele.dev_title;
                    var newContainer2 = document.createElement('div');
                    newContainer2.innerHTML = ele.dev_district;
                    var newContainer3 = document.createElement('div');
                    newContainer3.innerHTML = ele.dev_type;
                    var newContainer4 = document.createElement('div');
                    newContainer4.innerHTML = ele.dev_charge;
                    var newContainer5 = document.createElement('div');
                    newContainer5.innerHTML = ele.dev_method;

                    newDiv.appendChild(newContainer1);
                    newDiv.appendChild(newContainer2);
                    newDiv.appendChild(newContainer3);
                    newDiv.appendChild(newContainer4);
                    newDiv.appendChild(newContainer5);
                    wrapper.appendChild(newDiv);
                });
            })
                .fail(function (error) {
                    console.error(error);
                });
        }

        var city = document.getElementsByClassName('city_switch');
        Array.from(city).map(function(ele) {
            ele.addEventListener('click',function() {
                Array.from(city).map(function(ele2) {
                    ele2.className = 'listed city_switch';
                });
                this.className += ' active';
            });
        });

        var type = document.getElementsByClassName('type_switch');
        Array.from(type).map(function(ele) {
            ele.addEventListener('click',function() {
                Array.from(type).map(function(ele2) {
                    ele2.className = 'listed type_switch';
                });
                this.className += ' active';
            })
        });
        var charge = document.getElementsByClassName('charge_switch');
        Array.from(charge).map(function(ele) {
            ele.addEventListener('click',function() {
                Array.from(charge).map(function(ele2) {
                    ele2.className = 'listed charge_switch';
                });
                this.className += ' active';
            })
        });
        var district = document.getElementsByClassName('district_switch');
        Array.from(district).map(function(ele) {
            ele.addEventListener('click',function() {
                Array.from(district).map(function(ele2) {
                    ele2.className = 'listed district_switch';
                });
                this.className += ' active';
            })
        });

        function ClearBtn() {
            var wrapper = document.getElementsByClassName('dev_info_result_wrapper')[0];
            wrapper.innerHTML = '';
            dev_data = {
                dev_district: '',
                dev_type: '',
                dev_charge: ''
            };
            Array.from(city).map(function(ele) {
                ele.className = 'listed city_switch'
            });
            Array.from(district).map(function(ele) {
                ele.className = 'listed district_switch'
            });
            Array.from(type).map(function(ele) {
                ele.className = 'listed type_switch'
            });
            Array.from(charge).map(function(ele) {
                ele.className = 'listed charge_switch'
            })
        }

    </script>
@endsection