@extends('layouts.admin')
@section('content')
    <div id='library' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 자료실</strong></h1>
            <form id="library-form" method="POST" action="{{route('admin.library.store')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="row">
                    <table>
                        <tr>
                        <td class="datainput"><label for="library_title">제목</label></td>
                        <td>
                            <input type="text" id="library_title" name="library_title" class="form-control"
                                   placeholder="제목을 입력해주세요." size="68" value="{{old('library_title')}}">
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
                                <textarea id="library_content" class="form-control" name="library_content" cols="70" placeholder="자료실 내용을 입력해주세요.">
                                {{ old('library_content')}}
                                </textarea>
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
                                       value="{{ old('library_fileimage') }}">
                                @if ($errors->has('library_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('library_fileimage') }}
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