@extends('layouts.admin')
@section('content')
    <style>
        #library td {
            padding: 15px;
            padding-right: 20px;
        }

        #library input {
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
    <div id="library" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ {{ $data->library_title }} 자료실 수정</strong></h1>
            <form id="library-form" method="POST" action="{{ route('admin.library.update', $data->library_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="library_title">제목</label></td>
                            <td>
                                <input type="text" id="library_title" name="library_title" class="form-control"
                                       placeholder="제목을 입력해주세요." size="68" value="{{old('library_title', $data->library_title)}}">
                                @if ($errors->has('library_title'))
                                    <div class="help-block">
                                        {{ $errors->first('library_title') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="library_content">자료실 내용</label></td>
                            <td>
                                <textarea id="library_content" class="form-control" name="library_content" cols="70" placeholder="자료실 내용을 입력해주세요.">{{ old('library_content',$data->library_content)}}</textarea>
                                @if ($errors->has('library_content'))
                                    <div class="help-block">
                                        {{ $errors->first('library_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="library_fileimage">파일 첨부</label></td>
                            <td>
                                <input type="file" id="library_fileimage" name="library_fileimage" class="image"
                                       value="{{ old('library_fileimage', $data->library_fileimage) }}">
                                @if ($errors->has('library_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('library_fileimage') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="library-form" class="btn btn-success">
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