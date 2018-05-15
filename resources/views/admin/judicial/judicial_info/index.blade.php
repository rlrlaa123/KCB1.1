@extends('layouts.admin')
@section('content')
    <div id="1" class="infoput">
        <div class="container">
            <h1 class="infoputheader"><strong>※ 유권해석/판례</strong></h1>
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
            {!! Form::open(array('url' => '/admin/judicialfileupload/','enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <table>
                    <tr>
                        <td class="datainput">제목</td>

                        <td>{!! Form::text('j_title', null,array('class'=>'form-control','placeholder'=>'제목을 입력해주세요.', 'size'=>68 )) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">내용</td>
                        <td>{!! Form::textarea('j_content', null, array('class'=>'form-control', 'placeholder'=>'유권해석/판례를 입력해주세요.', 'cols'=>70)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">파일 첨부</td>
                        <td>{!! Form::file('j_fileimage', array('class' => 'image')) !!}</td>
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


    <script>

        @if($messaged = Session::get('success'))
        alert('등록이 완료되었습니다.');
        {{--var i;--}}
        {{--var x = document.getElementsByClassName("infoput");--}}
        {{--for (i = 0; i < x.length; i++) {--}}
        {{--x[i].style.display = "none";--}}
        {{--}--}}
        {{--document.getElementById({{$messaged}}).style.display = "block";--}}
        @endif
    </script>
@endsection