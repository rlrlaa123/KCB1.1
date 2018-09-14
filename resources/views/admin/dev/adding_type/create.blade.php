@extends('layouts.admin')
@section('content')
    <style>
        #adding_type td {
            padding: 15px;
            padding-right: 20px;
        }

        #adding_type input {
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
    <div id="adding_type" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>*유형 추가</strong></h1>
            <form id="adding_type-form" method="POST" action="{{ route('admin.adding_type.store') }}"
                  enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="search_type_id">유형 번호</label></td>
                            <td>
                                <input type="number" id="search_type_id" name="search_type_id" class="form-control">
                                @if ($errors->has('search_type_id'))
                                    <div class="help-block">
                                        {{ $errors->first('search_type_id') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="search_type">유형 이름</label></td>
                            <td>
                                <input type="text" id="search_type" name="search_type" class="form-control"
                                       placeholder="유형 이름을 입력해주세요." size="68">
                                @if ($errors->has('search_type'))
                                    <div class="help-block">
                                        {{ $errors->first('search_type') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="adding_type-form" class="btn btn-success">
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