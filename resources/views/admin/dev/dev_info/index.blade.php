@extends('layouts.admin')
@section('content')

    <style>

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
            @if ($errors->has('development'))
                <div>
                    {{$errors->first('development')}}
                </div>
                {{--<div class="alert alert-danger">--}}
                    {{--<strong>양식에 맞게 채워주세요.</strong><br><br>--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
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
                        <td class="datainput"><label for="dev_city">시/도</label><label for="district">군/구</label>
                        </td>
                        <td>
                            <select id="dev_city" name="dev_city" form="development" onchange="showDistrictList(value)">
                                <option value=null selected>선택해주세요</option>
                                @foreach($cities as $city)
                                    <option class="listed" value="{{$city->dev_city}}">
                                        {{$city->dev_city}}
                                    </option>
                                @endforeach
                            </select>
                            <select id="district" name="dev_district" form="development">
                                @foreach($locations as $loc)
                                    <option class="listed2" id="{{ $loc->num_id }}"
                                            style="display: none">{{$loc->dev_district}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td class="datainput">위치</td>--}}
                        {{--<td>{!! Form::text('location' ,null, array('class'=>'form-control', 'placeholder'=>'해당 개발예정지구 위치를 입력해주세요.')) !!}--}}
                        {{--</td>--}}
                    {{--</tr>--}}
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
                        <td>{!! Form::date('dev_publicly_starting_date' ,null, array('class'=>'form-control')) !!}
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
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">위치 이미지</td>
                        <td>{!! Form::file('dev_fileimage', array('class' => 'image')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="savebutton" colspan="2">
                            <button type="submit" class="btn btn-success" onclick="window.console.log({{$errors}})">저장하기
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            {!! Form::close() !!}
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
            console.log(loc);
            var i;
            var x = document.getElementsByClassName('listed2');
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            $.ajax({
                type: "POST",
                url: '/admin/showdistrictlist',
                data: {data: loc}
            }).done(function (district) {
                console.log(district);
                district.map(function (ele) {
                    document.getElementById(ele['num_id']).style.display = 'block';

                })

// document.getElementById(district);
            })
                .fail(function (error) {
                    console.error(error);
                });
        }
    </script>
@endsection