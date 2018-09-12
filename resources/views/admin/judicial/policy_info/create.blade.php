@extends('layouts.admin')
@section('content')
    <div id='policy' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 규정&지침</strong></h1>
            <form id="policy-form" method="POST" action="{{route('admin.policy.store')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="row">
                    <table>
                        <tr>
                        <td class="datainput"><label for="p_title">제목</label></td>
                        <td>
                            <input type="text" id="p_title" name="p_title" class="form-control"
                                   placeholder="제목을 입력해주세요." size="80%" value="{{old('p_title')}}">
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
                                <textarea id="p_content" class="form-control" name="p_content"  cols="90%" rows="20%" placeholder="규정&지침 내용을 입력해주세요.">
                                {{ old('p_content')}}
                                </textarea>
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
                                       value="{{ old('p_fileimage') }}">
                                @if ($errors->has('p_fileimage'))
                                    <div class="help-block">
                                        {{ $errors->first('p_fileimage') }}
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