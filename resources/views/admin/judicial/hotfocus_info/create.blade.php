@extends('layouts.admin')
@section('content')
    <div id='hf' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ HOT 포커스</strong></h1>
            <form id="hotfocus-form" method="POST" action="{{route('admin.hotfocus.store')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="row">
                    <table>
                        <tr>
                        <td class="datainput"><label for="hf_title">제목</label></td>
                        <td>
                            <input type="text" id="hf_title" name="hf_title" class="form-control"
                                   placeholder="제목을 입력해주세요." size="80%" value="{{old('hf_title')}}">
                            @if ($errors->has('hf_title'))
                                <div class="help-block">
                                    {{ $errors->first('hf_title') }}
                                </div>
                            @endif
                        </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="hf_content">HOT 포커스 내용</label></td>
                            <td>
                                <textarea id="hf_content" class="form-control" name="hf_content"  cols="90%" rows="20%" placeholder="HOT 포커스 내용을 입력해주세요.">
                                {{ old('hf_content')}}
                                </textarea>
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
                                       value="{{ old('hf_fileimage') }}">
                                @if ($errors->has('hf_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('hf_fileimage') }}
                                    </div>
                                @endif
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
            </form>
        </div>
    </div>
@endsection