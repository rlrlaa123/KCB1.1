@extends('layouts.admin')
@section('content')
    <style>
        #development td {
            padding: 15px;
            padding-right: 20px;
        }

        #development input {
            overflow-x: auto;
            -ms-overflow-x: auto;
            overflow-y: auto;
            -ms-overflow-y: auto;
            text-overline: ellipsis;
            width: 100%;
            height: 20px;
        }

        div {
            vertical-align: middle;
        }

        .help-block {
            color: red;
            font-size: 13px;
            text-align: left;
        }
    </style>
    <div id="development" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ {{ $data->dev_title }} 사업 수정</strong></h1>
            <form id="development-form" method="POST" action="{{ route('admin.dev.update', $data->dev_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="dev_title">제목</label></td>
                            <td>
                                <input type="text" id="dev_title" name="dev_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68" value="{{ old($data->dev_title) }}">
                                @if ($errors->has('dev_title'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_initiated_log">추진내역</label></td>
                            <td>
                                <input type="text" id="dev_initiated_log" name="dev_initiated_log" class="form-control"
                                       placeholder="추진내역을 입력해주세요." size="68" value="{{ old($data->dev_initiated_log)}}">
                                @if ($errors->has('dev_initiated_log'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_initiated_log') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_initiated_date">추진내역날짜</label></td>
                            <td>
                                <input type="date" id="dev_initiated_date" name="dev_initiated_date"
                                       class="form-control" size="68" value="{{ old('dev_initiated_date') }}">
                                @if ($errors->has('dev_initiated_date'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_initiated_date') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev"></label>COMMENT</td>
                            <td>
                                <textarea id="dev_comment" name="dev_comment" class="form-control"
                                          placeholder="COMMENT를 입력해주세요." cols="70">{{ old('dev_comment') }}</textarea>
                                @if ($errors->has('dev_comment'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_comment') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_city">시/도</label><label for="dev_district">군/구 {{ old('dev_district') }}</label>
                            </td>
                            <td>
                                <select id="dev_city" name="dev_city" form="development-form"
                                        onchange="showDistrictList(value, '{{  $data->dev_city }}')">
                                    <option value={{ $data->dev_city }} selected>선택해주세요</option>
                                    @foreach($cities as $city)
                                        <option class="listed" value={{ $city->dev_city }} @if($data->dev_city == $city->dev_city) selected @endif>{{ $city->dev_city }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('dev_city'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_city') }}
                                    </div>
                                @endif
                                <select id="dev_district" name="dev_district" form="development-form">
                                    @foreach($locations as $loc)
                                        <option class="listed2" value="{{ $data->dev_district  }}"
                                                id="{{ $loc->num_id }}"
                                                style="display: none">
                                            {{$loc->dev_district}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('dev_district'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_district') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_type">유형 {{old('dev_type')}}</label></td>
                            <td>
                                <select id="dev_type" name="dev_type" form="development-form">
                                    @foreach($searchtype as $type)
                                        <option value={{ $type->search_type }} @if($data->dev_type == $type->search_type) selected @endif>{{ $type->search_type }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('dev_type'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_type') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_charge">주체</label></td>
                            <td>
                                <select id="dev_charge" name="dev_charge" form="development-form">
                                    @foreach($searchcharge as $charge)
                                        <option value={{ $charge->search_charge }} @if($data->dev_charge == $charge->search_charge) selected @endif>{{ $charge->search_charge }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('dev_charge'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_charge') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_area_size">면적 (m<sup>2</sup>)</label></td>
                            <td>
                                <input type="number" id="dev_area_size" name="dev_area_size"
                                       class="form-control" size="68" value="{{ old('dev_area_size') }}"
                                       placeholder="면적을 입력 요.">
                                @if ($errors->has('dev_area_size'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_area_size') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_status">보상상태</label></td>
                            <td>
                                <select id="dev_status" name="dev_status" form="development-form">
                                    <option value="전체" @if($data->dev_status == '전체') selected @endif>전체</option>
                                    <option value="보상예정" @if($data->dev_status == '보상예정') selected @endif>보상예정</option>
                                    <option value="보상중" @if($data->dev_status == '보상중') selected @endif>보상중</option>
                                    <option value="보상완료" @if($data->dev_status == '보상완료') selected @endif>보상완료</option>
                                </select>
                                @if ($errors->has('dev_status'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_status') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_method">사업 방식</label></td>
                            <td>
                                <input type="text" id="dev_method" name="dev_method" class="form-control"
                                       placeholder="사업방식을 입력해주세요." size="68" value="{{ old('dev_method') }}">
                                @if ($errors->has('dev_method'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_method') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_applied_law">적용 법률</label></td>
                            <td>
                                <input type="text" id="dev_applied_law" name="dev_applied_law" class="form-control"
                                       placeholder="적용법률을 입력해주세요." size="68" value="{{ old('dev_applied_law') }}">
                                @if ($errors->has('dev_applied_law'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_applied_law') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_publicly_starting_date">사업인정고시일</label></td>
                            <td>
                                <input type="date" id="dev_publicly_starting_date" name="dev_publicly_starting_date"
                                       class="form-control" value="{{ old('dev_publicly_starting_date') }}">
                                @if ($errors->has('dev_publicly_starting_date'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_publicly_starting_date') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_future_plan">향후 추진 계획</label></td>
                            <td>
                                <textarea id="dev_future_plan" name="dev_future_plan" class="form-control"
                                          placeholder="향후 추진 계획을 입력해주세요."
                                          cols="70">{{ old('dev_future_plan') }}</textarea>
                                @if ($errors->has('dev_future_plan'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_future_plan') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_reference[]">참고 자료</label></td>
                            <td>
                                <input type="file" id="dev_reference[]" name="dev_reference[]" class="image" multiple
                                       value="{{ old('dev_reference')}}">
                                @if ($errors->has('dev_reference'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_reference') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="dev_fileimage">위치 이미지</label></td>
                            <td>
                                <input type="file" id="dev_fileimage" name="dev_fileimage" class="image"
                                       value="{{ $data->dev_fileimage }}">
                                @if ($errors->has('dev_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('dev_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="development-form" class="btn btn-success">
                                    저장하기
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
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
        var e = document.getElementById('dev_city');
        var loc = e.options[e.selectedIndex].value;

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
            district.map(function (ele) {
                document.getElementById(ele['num_id']).value = ele['dev_district'];
                document.getElementById(ele['num_id']).style.display = 'block';
            })
        }).fail(function (error) {
            console.error(error);
        });

        function showDistrictList(loc, selected) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //---------------------------Showing Districts------------------------------------------------------------
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
                district.map(function (ele) {
                    console.log(ele['num_id']);
                    document.getElementById(ele['num_id']).value = ele['dev_district'];
                    document.getElementById(ele['num_id']).style.display = 'block';
                    if(document.getElementById(ele['num_id']).value === selected) {
                        document.getElementById('dev_district').selectedIndex = ele['num_id'];
                    }
                })
            }).fail(function (error) {
                console.error(error);
            });
        }
    </script>
@endsection