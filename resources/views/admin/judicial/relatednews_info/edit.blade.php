@extends('layouts.admin')
@section('content')
    <style>
        #relatednews td {
            padding: 15px;
            padding-right: 20px;
        }

        #relatednews input {
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
    <div id="relatednews" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ 관련 뉴스 수정</strong></h1>
            <form id="relatednews-form" method="POST" action="{{ route('admin.relatednews.update', $data->rn_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="rn_title">제목</label></td>
                            <td>
                                <input type="text" id="rn_title" name="rn_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68" value="{{old('rn_title', $data->rn_title)}}">
                                @if ($errors->has('rn_title'))
                                    <div class="help-block">
                                        {{ $errors->first('rn_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="rn_content">관련 뉴스 내용</label></td>
                            <td>
                                <textarea id="rn_content" class="form-control" name="rn_content" cols="70" placeholder="관련 뉴스 내용을 입력해주세요.">
                                {{ old('rn_content',$data->rn_content)}}
                                </textarea>
                                @if ($errors->has('rn_content'))
                                    <div class="help-block">
                                        {{ $errors->first('rn_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="rn_link">관련 뉴스 링크</label></td>
                            <td>
                                <input id="rn_link" class="form-control" name="rn_link" size="70" placeholder="관련 뉴스 내용을 입력해주세요." value="{{ old('rn_link',$data->rn_link)}}">
                                @if ($errors->has('rn_link'))
                                    <div class="help-block">
                                        {{ $errors->first('rn_link') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="rn_fileimage">파일 첨부</label></td>
                            <td>
                                <input type="file" id="rn_fileimage" name="rn_fileimage" class="image"
                                       value="{{ old('rn_fileimage', $data->rn_fileimage) }}">
                                @if ($errors->has('rn_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('rn_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="relatednews-form" class="btn btn-success">
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