@extends('layouts.app')
@section('style')
    <style>
        .content {
            margin: 1vw 15vw 1vw 15vw;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="page-header">
            {{--<h4>포럼<small> / 글 수정 / {{$article->title}}</small></h4>--}}
        </div>
        <form action="{{route('articles.update', $article->id)}}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            @include('articles.partial.form')
            <div class="form-group"><button>수정하기</button></div>
        </form>
    </div>
@endsection