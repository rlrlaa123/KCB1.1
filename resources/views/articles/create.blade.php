@extends('layouts.app')
<style>
    .communitycreate_page{
        margin:1vw 15vw 1vw 15vw;
    }
</style>
@section('content')
    <div class="communitycreate_page">
        <h4>게시글 작성</h4>
        <hr/>
        <form action="{{route('articles.store')}}"method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group"{{$errors->has('title')?'has-error':''}}>
                <label for="title">제목</label>
                <input type="text" name="title" id="title" value="{{old('title')}}"
                       class="form-control"/>
                {!! $errors->first('title','<span class="form-error">:message</span>') !!}
            </div>
            <div class="form-group{{$errors->has('content')?'hass-error':''}}">
                <label for="content">본문</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{old('content')}}</textarea>
                {!! $errors->first('content','<span class="form-error">:message</span>') !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">저장하기</button>
            </div>
        </form>
    </div>
@stop