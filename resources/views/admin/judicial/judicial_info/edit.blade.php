@extends('layouts.admin')
@section('content')
    <style>
        #j td {
            padding: 15px;
            padding-right: 20px;
        }

        #j input {
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
    <div id="j" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ 유권해석&판례 수정</strong></h1>
            <form id="judicial-form" method="POST" action="{{ route('admin.judicial.update', $data->j_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="j_title">제목</label></td>
                            <td>
                                <input type="text" id="j_title" name="j_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68" value="{{old('j_title', $data->j_title)}}">
                                @if ($errors->has('j_title'))
                                    <div class="help-block">
                                        {{ $errors->first('j_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="j_content">유권해석&판례 내용</label></td>
                            <td>
                                <textarea id="j_content" class="form-control" name="j_content" cols="70" placeholder="유권해석&판례 내용을 입력해주세요.">
                                {{ old('j_content', $data->j_content)}}
                                </textarea>
                                @if ($errors->has('j_content'))
                                    <div class="help-block">
                                        {{ $errors->first('j_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="j_fileimage">파일 첨부</label></td>
                            <td>
                                <input type="file" id="j_fileimage" name="j_fileimage" class="image"
                                       value="{{ old('j_fileimage', $data->j_fileimage) }}">
                                @if ($errors->has('j_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('j_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="judicial-form" class="btn btn-success">
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