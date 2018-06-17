@extends('layouts.admin')
@section('content')
    <div id='relatednews' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 관련 뉴스</strong></h1>
            <form id="relatednews-form" method="POST" action="{{route('admin.relatednews.store')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="row">
                    <table>
                        <tr>
                        <td class="datainput"><label for="rn_title">제목</label></td>
                        <td>
                            <input type="text" id="rn_title" name="rn_title" class="form-control"
                                   placeholder="제목을 입력해주세요." size="68" value="{{old('rn_title')}}">
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
                                {{ old('rn_content')}}
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
                                <input type="text" id="rn_link" name="rn_link" class="form-control" size="70" placeholder="관련 뉴스 링크를 입력해주세요." value="{{ old('rn_link') }}">
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
                                       value="{{ old('rn_fileimage') }}">
                                @if ($errors->has('rn_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('rn_fileimage') }}
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