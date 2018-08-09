@extends('layouts.admin')
@section('content')
    <div id='notice' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 공고 공시</strong></h1>
            <form id="notice-form" method="POST" action="{{route('admin.notice.store')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="row">
                    <table>
                        <tr>
                        <td class="datainput"><label for="notice_title">제목</label></td>
                        <td>
                            <input type="text" id="notice_title" name="notice_title" class="form-control"
                                   placeholder="제목을 입력해주세요." size="68" value="{{old('notice_title')}}">
                            @if ($errors->has('notice_title'))
                                <div class="help-block">
                                    {{ $errors->first('notice_title') }}
                                </div>
                            @endif
                        </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="notice_content">공고 공시 내용</label></td>
                            <td>
                                <textarea id="notice_content" class="form-control" name="notice_content" cols="70" placeholder="공고 공시 내용을 입력해주세요.">
                                {{ old('notice_content')}}
                                </textarea>
                                @if ($errors->has('notice_content'))
                                    <div class="help-block">
                                        {{ $errors->first('notice_content') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="fileimage">파일 첨부</label></td>
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