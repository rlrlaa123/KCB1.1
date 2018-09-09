@extends('layouts.app')
@section('content')
    <div class="introbody">
        <div>@include('layouts.partials.companyintro_list')
        </div>
        <hr/>
        <div>
            <div class="introductionPage">
                <h3 style="font-size: 1.5vw; font-weight: 700; color: black; text-align: left; margin: 4vh 0;">회사 위치</h3>
                <img src="img/location.jpg" style="width:100%;">
            </div>
        </div>
    </div>


@endsection