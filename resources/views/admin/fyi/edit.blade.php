@extends('layouts.admin')
@section('content')
    <style>
        #fyi td {
            padding: 15px;
            padding-right: 20px;
        }

        #fyi input {
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
    <div id="fyi" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ {{ $data->fyi_title }} 공지 수정</strong></h1>
            <form id="fyi-form" method="POST" action="{{ route('admin.fyi.update', $data->fyi_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="fyi_title">제목</label></td>
                            <td>
                                <input type="text" id="fyi_title" name="fyi_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68" value="{{old('fyi_title')}}">
                                @if ($errors->has('fyi_title'))
                                    <div class="help-block">
                                        {{ $errors->first('fyi_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="fyi_content">공지 내용</label></td>
                            <td>
                                <textarea id="fyi_content" class="form-control" name="fyi_content" cols="70" placeholder="공지 내용을 입력해주세요.">
                                {{ old('fyi_content')}}">
                                </textarea>
                                @if ($errors->has('fyi_content'))
                                    <div class="help-block">
                                        {{ $errors->first('fyi_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="fyi_fileimage">파일 첨부</label></td>
                            <td>
                                <input type="file" id="fyi_fileimage" name="fyi_fileimage" class="image"
                                       value="{{ old('fyi_fileimage') }}">
                                @if ($errors->has('fyi_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('fyi_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="fyi-form" class="btn btn-success">
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