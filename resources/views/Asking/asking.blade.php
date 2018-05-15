@extends('layouts.app')
<style>
    .askingpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .askingpage th, td {
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
    <div class="askingpage">
        <div>
            @include('layouts.partials.communitylist')
            <hr/>
            <h1 class="infoputheader"><strong>상담하기</strong></h1>
        </div>
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
        {!! Form::open(array('url' => '/asking_fileupload','enctype' => 'multipart/form-data')) !!}
        <div class="row">
            <table>
                <tr>
                    <td class="datainput">제목</td>
                    <td>{!! Form::text('asking_title', null,array('class' => 'form-control','placeholder'=>'제목을 입력해주세요.', 'size'=>68 )) !!}
                    </td>
                </tr>
                <tr>
                    <td class="datainput">작성자 성함</td>
                    <td>{!! Form::text('asking_user', null,array('class' => 'form-control','placeholder'=>'성함을 입력해주세요.', 'size'=>68 )) !!}
                    </td>
                </tr>
                <tr>
                    <td class="datainput">이메일</td>
                    <td>{!! Form::text('asking_user_email', null,array('class' => 'form-control','placeholder'=>'example@example.org', 'size'=>68 )) !!}
                    </td>
                </tr>
                <tr>
                    <td class="datainput">문의 내용</td>
                    <td>{!! Form::textarea('asking_content', null, array('class'=>'form-control', 'placeholder'=>'상담 문의 내용을 입력해주세요.', 'cols'=>70)) !!}
                    </td>
                </tr>
                <tr>
                    <td class="datainput">비밀번호</td>
                    <td>{!! Form::password('asking_password', null, array('class'=>'form-control', 'placeholder'=>'비밀번호를 입력해주세요.', 'cols'=>70)) !!}
                    </td>
                </tr>
                <tr>
                    <td class="datainput">파일 첨부</td>
                    <td>{!! Form::file('asking_file', array('class' => 'image')) !!}</td>
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

@endsection