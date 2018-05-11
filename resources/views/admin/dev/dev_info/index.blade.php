@extends('layouts.admin')
@section('content')
    <script>
        var dropFile = function (event) {
            event.preventDefault();
        }
    </script>
    <style>
        .dropfile {
            height: 10vh;
            width: auto;
            border: 1px solid black;
            background-color: lightgrey;
        }

        #development td {
            padding: 0.8vw;
        }

        #development input {
            overflow-x: auto;
            -ms-overflow-x: auto;
            overflow-y: auto;
            -ms-overflow-y: auto;
            text-overline: ellipsis;
            width: 100%;
        }

        div {
            vertical-align: middle;
        }
    </style>
    <div id="development" class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 개발정보검색</strong></h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>양식에 맞게 채워주세요.</strong><br><br>
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('id'=>'development','url' => 'admin/developmentfileupload','enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <table>
                    <tr>
                        <td class="datainput">제목</td>
                        <td>{!! Form::text('dev_title', null,array('class' => 'form-control','placeholder'=>'제목을 입력해주세요.', 'size'=>68 )) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">추진내역</td>
                        <td>{!! Form::text('dev_initiated_log', null, array('class'=>'form-control', 'placeholder'=>'추진내역을 입력해주세요.', 'size'=>68)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">추진내역날짜</td>
                        <td>{!! Form::date('dev_initiated_date', null, array('class'=>'form-control')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">COMMENT</td>
                        <td>{!! Form::textarea('dev_comment', null, array('class'=>'form-control', 'placeholder'=>'COMMENT를 입력해주세요.', 'cols'=>70)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput"><label for="dev_city">시/도</label><label for="dev_district">군/구</label>
                        </td>
                        <td>
                            <select id="dev_city" name="dev_city[]" form="development" multiple>
                                <option value="*">전체</option>
                                <option value="서울특별시">서울특별시</option>
                                <option value="인천광역시">인천광역시</option>
                                <option value="대전광역시">대전광역시</option>
                                <option value="대구광역시">대구광역시</option>
                                <option value="울산광역시">울산광역시</option>
                                <option value="부산광역시">부산광역시</option>
                                <option value="광주광역시">광주광역시</option>
                                <option value="세종특별자치시">세종특별자치시</option>
                                <optgroup label="경기도">
                                <option value="경기남부">경기남부</option>
                                <option value="경기북부">경기북부</option>
                                </optgroup>
                                <option value="강원도">강원도</option>
                                <option value="충청북도">충청북도</option>
                                <option value="충청남도">충청남도</option>
                                <option value="전라북도">전라북도</option>
                                <option value="전라남도">전라남도</option>
                                <option value="경상북도">경상북도</option>
                                <option value="경상남도">경상남도</option>
                                <option value="제주특별자치도">제주특별자치도</option>
                            </select>
                            <select id="dev_district" name="dev_district[]" form="development" multiple>
                                @foreach($locations as $location)
                                    <option value={{$location->dev_district}}>{{$location->dev_district}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">위치</td>
                        <td>{!! Form::text('location' ,null, array('class'=>'form-control', 'placeholder'=>'해당 개발예정지구 위치를 입력해주세요.')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput"><label for="dev_type">유형</label></td>
                        <td>
                            <select id="dev_type" name="dev_type[]" form="development" multiple>
                                <option value="*">전체</option>
                                <option value="공원조성사업">공원조성사업</option>
                                <option value="공공주택지구">공공주택지구</option>
                                <option value="뉴스테이공급촉진지구">뉴스테이공급촉진지구</option>
                                <option value="도시개발사업">도시개발사업</option>
                                <option value="택지개발예정지구">택지개발예정지구</option>
                                <optgroup label="경제자유구역">
                                    <option value="인천"> - 인천</option>
                                    <option value="부산진해"> - 부산진해</option>
                                    <option value="광양만"> - 광양만</option>
                                    <option value="대구경북"> - 대구경북</option>
                                    <option value="새만금"> - 새만금</option>
                                    <option value="황해"> - 황해</option>
                                    <option value="충북"> - 충북</option>
                                    <option value="동해안"> - 동해안</option>
                                </optgroup>
                                <option value="산업단지(농공단지)">산업단지(농공단지)</option>
                                <option value="물류유통단지">물류유통단지</option>
                                <option value="관광단지(유원지)">관광단지(유원지)</option>
                                <option value="국민임대주택단지">국민임대주택단지</option>
                                <option value="역세권개발사업">역세권개발사업</option>
                                <optgroup label="철도건설사업">
                                    <option value="철도건설사업"> - 철도건설사업</option>
                                    <option value="역사 신축 및 이전 사업"> - 역사 신축 및 이전 사업</option>
                                </optgroup>
                                <option value="국방·군사시설">국방·군사시설</option>
                                <option value="법조타운 신축 및 이전사업">법조타운 신축 및 이전사업</option>
                                <optgroup label="도로개설사업">
                                    <option value="고속도로 및 고속화도로"> - 고속도로 및 고속화도로</option>
                                    <option value="국도 및 대체 우회도로"> - 국도 및 대체 우회도로</option>
                                    <option value="지방도 및 대체 우회도로"> - 지방도 및 대체 우회도로</option>
                                    <option value="도시계획도로"> - 도시계획도로</option>
                                </optgroup>
                                <option value="친수구역조성사업">친수구역조성사업</option>
                                <option value="발전소건설사업">발전소건설사업</option>
                                <option value="댐건설사업">댐건설사업</option>
                                <optgroup label="특수물건">
                                    <option value="미불용지"> - 미불용지</option>
                                    <option value="장기 미집행 도시계획시설"> - 장기 미집행 도시계획시설</option>
                                    <option value="시가화 예정용지"> - 시가화 예정용지</option>
                                    <option value="도시계획시설(예정지)"> - 도시계획시설(예정지)</option>
                                    <option value="하천(제방)예정지"> - 하천(제방)예정지</option>
                                </optgroup>
                                <option value="행복주택지구">행복주택지구</option>
                                <option value="기타(기타, 주거환경개선지구, 재정비 촉진지구)">기타(기타, 주거환경개선지구, 재정비 촉진지구)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput"><label for="dev_charge">주체</label></td>
                        <td>
                            <select id="dev_charge" name="dev_charge[]" form="development" multiple>
                                <option value="*">전체</option>
                                <option value="LH">LH</option>
                                <option value="한국수자원공사">한국수자원공사</option>
                                <option value="한국농어촌공사">한국농어촌공사</option>
                                <optgroup label="지방공사">
                                    <option value="SH공사">SH공사</option>
                                    <option value="경기도시공사">경기도시공사</option>
                                    <option value="인천도시공사">인천도시공사</option>
                                    <option value="충남개발공사">충남개발공사</option>
                                    <option value="충북개발공사">충북개발공사</option>
                                    <option value="강원도개발공사">강원도개발공사</option>
                                    <option value="전남개발공사">전남개발공사</option>
                                    <option value="전북개발공사">전북개발공사</option>
                                    <option value="경상남도개발공사">경상남도개발공사</option>
                                    <option value="경상북도개발공사">경상북도개발공사</option>
                                    <option value="대구도시공사">대구도시공사</option>
                                    <option value="대전도시공사">대전도시공사</option>
                                    <option value="부산도시공사">부산도시공사</option>
                                    <option value="울산도시공사">울산도시공사</option>
                                    <option value="경북관광개발공사">경북관광개발공사</option>
                                    <option value="광주광역시도시공사">광주광역시도시공사</option>
                                    <option value="제주특별자치도개발공사">제주특별자치도개발공사</option>
                                </optgroup>
                                <optgroup label="기초지자체공사">
                                    <option value="김포도시개발공사">김포도시개발공사</option>
                                    <option value="남양주도시공사">남양주도시공사</option>
                                    <option value="의왕도시공사">의왕도시공사</option>
                                    <option value="양평지방공사">양평지방공사</option>
                                    <option value="화성도시공사">화성도시공사</option>
                                    <option value="안산도시공사">안산도시공사</option>
                                    <option value="평택도시공사">평택도시공사</option>
                                    <option value="용인지방공사">용인지방공사</option>
                                    <option value="여수도시공사">여수도시공사</option>
                                    <option value="하남도시개발공사">하남도시개발공사</option>
                                    <option value="춘천도시개발공사">춘천도시개발공사</option>
                                    <option value="창녕군개발공사">창녕군개발공사</option>
                                </optgroup>
                                <option value="기타">기타</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput"><label for="dev_status">보상상태</label></td>
                        <td>
                            <select id="dev_status" name="dev_status" form="development">
                                <option value="*">전체</option>
                                <option value="보상예정">보상예정</option>
                                <option value="보상중">보상중</option>
                                <option value="보상완료">보상완료</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">사업 방식</td>
                        <td>{!! Form::text('dev_method' ,null, array('class'=>'form-control', 'placeholder'=>'사업방식을 입력해주세요.')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">적용 법률</td>
                        <td>{!! Form::text('dev_applied_law' ,null, array('class'=>'form-control', 'placeholder'=>'적용법률을 입력해주세요.')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">사업인정고시일</td>
                        <td>{!! Form::date('dev_publicly_starting_date' ,null, array('class'=>'form-control', 'placeholder'=>'사업인정고시일을 입력해주세요.')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">향후 추진 계획</td>
                        <td>{!! Form::textarea('dev_future_plan' ,null, array('class'=>'form-control', 'placeholder'=>'향후 추진 계획을 입력해주세요.', 'cols'=>70)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">참고 자료</td>
                        <td>{!! Form::file('dev_reference[]',null, array('class'=>'image', 'multiple'=>true)) !!}
                            <div class="dropfile" onchange="dropFile();"><p
                                        style="text-align:center; vertical-align: middle">파일을 드래그해주세요.</p></div>

                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">위치 이미지</td>
                        <td>{!! Form::file('dev_fileimage', array('class' => 'image')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="savebutton" colspan="2">
                            <button type="submit" class="btn btn-success">저장하기
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection