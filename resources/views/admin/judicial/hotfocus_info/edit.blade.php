@extends('layouts.admin')
@section('content')
    <style>
        #hf td {
            padding: 15px;
            padding-right: 20px;
        }

        #hf input {
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
    <div id="hf" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ 공지 수정</strong></h1>
            <form id="hotfocus-form" method="POST" action="{{ route('admin.hotfocus.update', $data->hf_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="hf_title">제목</label></td>
                            <td>
                                <input type="text" id="hf_title" name="hf_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68" value="{{old('hf_title',$data->hf_title)}}">
                                @if ($errors->has('hf_title'))
                                    <div class="help-block">
                                        {{ $errors->first('hf_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="hf_content">공지 내용</label></td>
                            <td>
                                <textarea id="hf_content" class="form-control" name="hf_content" cols="70" placeholder="공지 내용을 입력해주세요.">{{ old('hf_content',$data->hf_content)}}</textarea>
                                @if ($errors->has('hf_content'))
                                    <div class="help-block">
                                        {{ $errors->first('hf_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="hf_fileimage">파일 첨부</label></td>
                            <td>
                                <input type="file" id="hf_fileimage" name="hf_fileimage" class="image"
                                       value="{{ old('hf_fileimage',$data->hf_fileimage) }}">
                                @if ($errors->has('hf_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('hf_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="hotfocus-form" class="btn btn-success">
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