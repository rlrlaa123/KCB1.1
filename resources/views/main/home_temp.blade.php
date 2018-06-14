@extends('layouts.app')
@section('style')
    <style>
        .lens_button {
            padding: 0;
            margin: 0;
            border: #e85254;
            background-color: #e85254;
            border-radius: 0.4vw;
        }

        .lens_button img {
            background-color: #e85254;
            padding: 6px;
            margin: 0;
            border: none;
            width: 38px;
            height: 35px;
            cursor: pointer;
            border-radius: 0.4vw;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        @media (orientation: portrait) {
            .searchform {
                width: 80%;
                margin: auto !important;
            }

            .searchbarcontainer {
                padding: 0 !important;
            }

            .btn-wrapper {
                margin: auto;
            }
        }

        .searchbarcontainer {
            text-align: center;
            margin: 0;
            padding: 5vw;
            background-image: url('/img/navbarbackgroundpicture.png');
            -webkit-background-size: 100%;
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('content')
    <div class="searchbarcontainer">
        <form class="navbar-form searchform" method="GET" action="{{url('/search/')}}">
            <input type="search" name="search" class="form-control" placeholder="검색" size="40">
            <button type="submit" class="lens_button"><img src="/img/searchbarbutton.png"/>
            </button>
        </form>
        <div class="btn-wrapper">
            <a href="{{url('notice')}}" class="navbarotherpage">TODAY 보상 공고/공시</a>
            <a href="{{url('/consulting')}}" class="navbarotherpage">보상 용역 대행 컨설팅</a>
        </div>
    </div>
@endsection