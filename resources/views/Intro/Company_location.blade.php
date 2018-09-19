@extends('layouts.app')
@section('content')
    <div class="introbody">
        <div>@include('layouts.partials.companyintro_list')
        </div>
        <hr/>
        <div>
            <div class="introductionPage">
                <h3 style="font-size: 1.5vw; font-weight: 700; color: black; text-align: left; margin: 4vh 0;">회사 위치</h3>
                <a href="https://map.naver.com/?__pinOnly=false&perimeter=1&query=&searchCoord=&menu=location&tab=1&lng=eca40e4a873f891e12621ef4d07ba61e&__fromRestorer=true&mapMode=0&mpx=1e5726e1cf9288a573300671df225b3a1c83781ddbdf7ebbd51aedd89ad4a193cd7249621fcc7abc257d94d34219b0d8&pinId=31132214&pinType=site&lat=282d89648c91ecab89ede8e10786771a&dlevel=11&enc=b64" target="_blank">
                <img src="img/location.jpg" style="width:80%;"></a>
            </div>
        </div>
    </div>


@endsection