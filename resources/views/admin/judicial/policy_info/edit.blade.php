@extends('layouts.admin')
@section('content')
    <style>
        #policy td {
            padding: 15px;
            padding-right: 20px;
        }

        #policy input {
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
    <div id="policy" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ {{ $data->p_title }} 규정&지침 수정</strong></h1>
            <form id="policy-form" method="POST" action="{{ route('admin.policy.update', $data->p_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="p_title">제목</label></td>
                            <td>
                                <input type="text" id="p_title" name="p_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="80%" value="{{old('p_title', $data->p_title)}}">
                                @if ($errors->has('p_title'))
                                    <div class="help-block">
                                        {{ $errors->first('p_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="p_content">규정&지침 내용</label></td>
                            <td>
                                <textarea id="p_content" class="form-control" name="p_content" cols="90%" rows="20%" placeholder="규정&지침 내용을 입력해주세요.">{{ old('p_content', $data->p_content)}}</textarea>
                                @if ($errors->has('p_content'))
                                    <div class="help-block">
                                        {{ $errors->first('p_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="p_fileimage">파일 첨부</label></td>
                            <td>
                                <input type="file" id="p_fileimage" name="p_fileimage" class="image"
                                       value="{{ old('p_fileimage', $data->p_fileimage) }}">
                                @if ($errors->has('p_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('p_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="policy-form" class="btn btn-success">
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