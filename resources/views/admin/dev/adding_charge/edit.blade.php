@extends('layouts.admin')
@section('content')
    <style>
        #adding_charge td {
            padding: 15px;
            padding-right: 20px;
        }

        #adding_charge input {
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
    <div id="adding_charge" class="infoput">
        <div class="container" style="margin: 0 5%;">
            <h1 class="infoputheader"><strong>※ {{ $data->search_charge }} || 주체 수정</strong></h1>
            <form id="adding_charge-form" method="POST" action="{{ route('admin.adding_charge.update', $data->search_charge_id) }}"
                  enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table>
                        <tr>
                            <td class="datainput"><label for="search_charge_id">주체 번호</label></td>
                            <td>
                                <input type="number" id="search_charge_id" name="search_charge_id" class="form-control"
                                       value="{{ old('search_charge_id',$data->search_charge_id) }}">
                                @if ($errors->has('search_charge_id'))
                                    <div class="help-block">
                                        {{ $errors->first('search_charge_id') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="datainput"><label for="search_charge">주체 이름</label></td>
                            <td>
                                <input type="text" id="search_charge" name="search_charge" class="form-control"
                                       placeholder="주체 이름을 입력해주세요." size="68"
                                       value="{{ old('search_charge',$data->search_charge)}}">
                                @if ($errors->has('search_charge'))
                                    <div class="help-block">
                                        {{ $errors->first('search_charge') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="savebutton" colspan="2">
                                <button type="submit" form="adding_charge-form" class="btn btn-success">
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