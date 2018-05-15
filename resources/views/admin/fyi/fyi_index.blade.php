@extends('layouts.admin')
@section('content')
    <style>
        .sidesubmenu li:hover {
            text-decoration: underline;
        }

        .infoput {
            width: 100%;
        }

        .infoput table, td {
            border: 1px solid;
        }

        .infoput table {
            border-collapse: collapse;
        }

        .container {
            text-align: center;
        }

        .infoputheader {
            font-weight: normal;
            font-size: 1.4em;
            text-align: left;
        }

        .datainput {
            font-size: 1vw;
            padding: 1vw 1vw 1vw 1vw;
            background-color: #FFFFF0;
        }

        .savebutton {
            text-align: center;
        }

    </style>
    <div id='fyi' class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 공지사항</strong></h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>양식에 맞게 채워주세요.</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('url' => '/admin/fyifileupload/','enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <table>
                    <tr>
                        <td class="datainput">제목</td>

                        <td>{!! Form::text('fyi_title', null,array('class'=>'form-control','placeholder'=>'제목을 입력해주세요.', 'size'=>68 )) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">내용</td>
                        <td>{!! Form::textarea('fyi_content', null, array('class'=>'form-control', 'placeholder'=>'공지사항 내용을 입력해주세요.', 'cols'=>70)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">파일 첨부</td>
                        <td>{!! Form::file('fyi_fileimage', array('class' => 'image')) !!}</td>
                    </tr>
                    <tr>
                        <td class="savebutton" colspan="2">
                            <button type="submit" class="btn btn-success">저장하기
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection