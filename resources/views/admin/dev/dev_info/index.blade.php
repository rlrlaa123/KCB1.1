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
            {!! Form::open(array('id'=>'development','url' => '/admin/developmentfileupload/','enctype' => 'multipart/form-data')) !!}
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
                                @foreach($searchtype as $type)
                                    <option value={{$type->search_type}}>{{$type->search_type}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput"><label for="dev_charge">주체</label></td>
                        <td>
                            <select id="dev_charge" name="dev_charge[]" form="development" multiple>
                                @foreach($searchcharge as $charge)
                                    <option value={{$charge->search_charge}}>{{$charge->search_charge}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput"><label for="dev_status">보상상태</label></td>
                        <td>
                            <select id="dev_status" name="dev_status" form="development">
                                <option value="전체">전체</option>
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