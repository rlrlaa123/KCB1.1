@extends('layouts.app')
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
</script>
<style>
    .reportpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .reportpage th, td {
        text-align: center;
        border: solid 1px transparent;
    }


</style>
<script>
    @if (session('success'))
    alert('{{ session('success') }}');
    @endif
</script>
@section('content')
    <div class="reportpage">
        <div>
            @include('layouts.partials.communitylist')
            <hr/>
            <h1 class="infoputheader"><strong>신고하기</strong></h1>
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
            {!! Form::open(array('url' => '/report_fileupload','enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <table>
                    <tr>
                        <td class="datainput">제목</td>
                        <td>{!! Form::text('report_title', null,array('class' => 'form-control','placeholder'=>'제목을 입력해주세요.', 'size'=>68 )) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">작성자</td>
                        <td>{!! Form::text('report_user', null,array('class' => 'form-control','placeholder'=>'제목을 입력해주세요.', 'size'=>68 )) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">이메일</td>
                        <td>{!! Form::text('report_user_email', null,array('class' => 'form-control','placeholder'=>'example@example.org', 'size'=>68 )) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">신고 내용</td>
                        <td>{!! Form::textarea('report_content', null, array('class'=>'form-control', 'placeholder'=>'신고 내용을 입력해주세요.', 'cols'=>70)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="datainput">비밀번호</td>
                        <td>{!! Form::password('report_password', null, array('class'=>'form-control', 'placeholder'=>'비밀번호를 입력해주세요.', 'cols'=>70)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="savebutton" colspan="2">
                            <button type="submit" class="btn btn-success"
                                    style="border:1px solid black; background-color: transparent; color:black;">저장하기
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection