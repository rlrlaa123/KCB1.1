@extends('layouts.admin')
@section('content')
    <div id='fyi' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 공지사항</strong></h1>
            <form id="fyi-form" method="POST" action="{{route('admin.fyi.store')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
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
                                <textarea id="fyi_content" class="form-control" name="fyi_content" cols="70" placeholder="공지 내용을 입력해주세요.">{{ old('fyi_content')}}</textarea>
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