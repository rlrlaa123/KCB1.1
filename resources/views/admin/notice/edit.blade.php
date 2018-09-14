@extends('layouts.admin')
@section('content')
    <style>
        #notice td {
            padding: 15px;
            padding-right: 20px;
        }

        #notice input {
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
    <div id="notice" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ 공고 고시 수정</strong></h1>
            <form id="notice-form" method="POST" action="{{ route('admin.notice.update', $data->id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="notice_title">제목</label></td>
                            <td>
                                <input type="text" id="notice_title" name="notice_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68"
                                       value="{{old('notice_title', $data->notice_title)}}">
                                @if ($errors->has('notice_title'))
                                    <div class="help-block">
                                        {{ $errors->first('notice_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="classification">전체 / TODAY 분류</label></td>
                            <td>
                                <select id="classification" name="classification" form="notice-form">
                                    @if ($data->classification == 'all')
                                        <option value="all" selected>전체 보상 공고/고시</option>
                                    @else
                                        <option value="all">전체 보상 공고/고시</option>
                                    @endif
                                    @if ($data->classification == 'today')
                                        <option value="today" selected>TODAY 보상 공고/고시</option>
                                    @else
                                        <option value="today">TODAY 보상 공고/고시</option>
                                    @endif
                                </select>
                                @if ($errors->has('classification'))
                                    <div class="help-block">
                                        {{ $errors->first('classification') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="location">시/도</label></td>
                            <td>
                                <select id="location" name="location" form="notice-form">
                                    <option value={{ $data->location }} selected>선택해주세요</option>
                                    @foreach($cities as $city)
                                        <option class="listed"
                                                value={{ $city->dev_city }} @if($data->location == $city->dev_city) selected @endif>{{ $city->dev_city }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('location'))
                                    <div class="help-block">
                                        {{ $errors->first('location') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="fileimage">이미지 첨부</label></td>
                            <td>
                                <input type="file" id="fileimage" name="fileimage[]" class="image" multiple>
                                @if ($errors->has('fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="file">파일 첨부</label></td>
                            <td>
                                <input type="file" id="file" name="file[]" class="image" multiple>
                                @if ($errors->has('file'))
                                    <div class="help-block">
                                        {{ $errors->first('file') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="notice-form" class="btn btn-success">
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